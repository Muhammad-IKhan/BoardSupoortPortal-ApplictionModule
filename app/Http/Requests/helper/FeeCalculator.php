<?php

namespace App\Http\Requests\helper;

use App\Models\Head;
use InvalidArgumentException;
use Illuminate\Support\Facades\Log;

class FeeCalculator
{
    private const MIN_COUNT = 1;
    
    private FeeFinalizingService $feeFinalizingService;

    public function __construct(FeeFinalizingService $feeFinalizingService)
    {
        $this->feeFinalizingService = $feeFinalizingService;
    }

    public function calculateAmong3(array $data, Head $application): float
    {
        try {
            $this->validateData($data);
            $selfInputAmount = $this->getSelfInputAmount($data);
            $paperDocCount = $this->getPaperDocCount($data);

            $serviceFee = (float) ($application->h_service_fee ?? 0);
            $selectedDocsFee = (float) ($this->feeFinalizingService->calculatePrice($data['application'],
                                     $data['document_count'] ?? null,$data['paper_count'] ?? null) ?? 0);
 
            $totalFee = max( $serviceFee, $selectedDocsFee, $selfInputAmount);
            
            Log::info('calculation completed for print now focus on for db', [
                'application' => $data['application'],
                'total_fee' => $totalFee,
                'breakdown' => [
                    'self_input' => $selfInputAmount,
                    'service_fee' => $serviceFee,
                    'docs_fee' => $selectedDocsFee,
                ]
            ]);

            return $totalFee;

        } catch (\Exception $e) {
            Log::error('Fee calculation failed', [
                'error' => $e->getMessage(),
                'data' => $data
            ]);
            throw $e;
        }
    }

    private function validateData(array $data): void
    {
        if (!isset($data['application'])) {
            throw new InvalidArgumentException('Application ID is required');
        }
        try {
            Head::findOrFail($data['application']);
        } catch (\Exception $e) {
            throw new InvalidArgumentException('Invalid application ID');
        }

        if (isset($data['document_count']) && $data['document_count'] < self::MIN_COUNT) {
            throw new InvalidArgumentException('Document count must be at least ' . self::MIN_COUNT);
        }

        if (isset($data['paper_count']) && $data['paper_count'] < self::MIN_COUNT) {
            throw new InvalidArgumentException('Paper count must be at least ' . self::MIN_COUNT);
        }
    }

    private function getPaperDocCount(array $data): int
    {
        return (int) ($data['document_count'] ?? $data['paper_count'] ?? self::MIN_COUNT);
    }

    private function getSelfInputAmount(array $data): float
    {
        return (float) ($data['custom_amount'] ?? 0);
    }
}