<?php

namespace App\Http\Requests\helper;

use InvalidArgumentException;
use Illuminate\Support\Facades\Log;

class FeeFinalizingService
{
    private const MIGRATION_ID = 1;
    private const VERIFICATION_ID = 2;
    private const IBCC_VERIFICATION_ID = 3;
    private const DUPLICATE_DMC_ID = 4;
    private const REVISED_DMC_ID = 5;
    private const DUPLICATE_CERTIFICATE_ID = 6;
    private const REVISED_CERTIFICATE_ID = 7;
    private const UFM_APPEAL_ID = 8;
    private const CENTRE_CHANGE_ID = 9;
    private const RETOTALLING_ID = 10;
    private const RESULT_GAZETTE_FEE_ID = 11;
    private const CENTRE_CREATION_FEE_ID = 12;
    private const CORRECTION_BY_COURT_ID = 13;
    private const UNNATURAL_GAP_CORRECTION_ID = 14;
    private const SPELLING_VOWEL_CORRECTION_ID = 15;
    private const CORRECTION_BY_AWR_ID = 16;
    private const MISCELLANEOUS_FEE_ID = 17;
    private const PAPERS_CANCELLATION_ID = 18;
    private const GRACE_MARKS_ID = 19;
    private const JURY_APPEAL_ID = 20;
    private const MIGRATION_CANCELLATION_ID = 21;
    

    private const FEE_STRUCTURE = [
    self::MIGRATION_ID => ['base' => 1200, 'additional' => 1200],
    self::VERIFICATION_ID => ['base' => 700, 'additional' => 700],
    self::IBCC_VERIFICATION_ID => ['base' => 1000, 'additional' => 1000],
    self::DUPLICATE_DMC_ID => ['base' => 700, 'additional' => 700],
    self::REVISED_DMC_ID => ['base' => 500, 'additional' => 500],
    self::DUPLICATE_CERTIFICATE_ID => ['base' => 1500, 'additional' => 1500],
    self::REVISED_CERTIFICATE_ID => ['base' => 800, 'additional' => 800],
    self::UFM_APPEAL_ID => ['base' => 1500, 'additional' => 1500],
    self::CENTRE_CHANGE_ID => ['base' => 5000, 'additional' => 5000],
    self::RETOTALLING_ID => ['base' => 600, 'additional' => 600],
    self::RESULT_GAZETTE_FEE_ID => ['base' => 1500, 'additional' => 1500],
    self::CENTRE_CREATION_FEE_ID => ['base' => 50000, 'additional' => 50000],
    self::CORRECTION_BY_COURT_ID => ['base' => 3500, 'additional' => 3500],
    self::UNNATURAL_GAP_CORRECTION_ID => ['base' => 4500, 'additional' => 4500],
    self::SPELLING_VOWEL_CORRECTION_ID => ['base' => 2500, 'additional' => 2500],
    self::CORRECTION_BY_AWR_ID => ['base' => 2500, 'additional' => 2500],
    self::MISCELLANEOUS_FEE_ID => ['base' => 0, 'additional' => 0],
    self::PAPERS_CANCELLATION_ID => ['base' => 2000, 'additional' => 2000],
    self::GRACE_MARKS_ID => ['base' => 500, 'additional' => 500],
    self::JURY_APPEAL_ID => ['base' => 1500, 'additional' => 1500],
    self::MIGRATION_CANCELLATION_ID => ['base' => 700, 'additional' => 700],
    ];

    public function calculatePrice(int $applicationId, ?int $documentCount, ?int $paperCount): float {
        try {
            if (!isset(self::FEE_STRUCTURE[$applicationId])) {
                Log::warning('Not listed in caluculation needed type applications or need for work here in file', ['application' => $applicationId]);
                return 0.0;
            }

            $feeConfig = self::FEE_STRUCTURE[$applicationId];
            $count = $this->getRelevantCount($applicationId, $documentCount, $paperCount);

            $totalPrice = $feeConfig['base'] + 
                         max(0, $count - 1) * $feeConfig['additional'];

            Log::info('fee calculation completed inside the func**** fee by the sturectured private const variables', [
                'application' => $applicationId,
                'count' => $count,
                'total_price' => $totalPrice
            ]);

            return $totalPrice;

        } catch (\Exception $e) {
            Log::error('Price calculation failed', [
                'error' => $e->getMessage(),
                'application' => $applicationId,
                'document_count' => $documentCount,
                'paper_count' => $paperCount
            ]);
            throw $e;
        }
    }

    private function getRelevantCount(
        int $applicationId, 
        ?int $documentCount, 
        ?int $paperCount
    ): int {
        return match ($applicationId) {
            self::VERIFICATION_ID, 
            self::IBCC_VERIFICATION_ID => $documentCount ?? 1,
            self::RETOTALLING_ID, 
            self::GRACE_MARKS_ID => $paperCount ?? 1,
            default => 1
        };
    }
}