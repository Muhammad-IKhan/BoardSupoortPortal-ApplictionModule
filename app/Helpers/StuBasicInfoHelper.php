<?php

namespace App\Helpers;

use App\Models\{Student, BasicInfoBreakdown}; 
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class StuBasicInfoHelper
{
    private const REQUIRED_STUDENT_FIELDS = [
        'name',
        'father_name',
        'roll_number',
        'class',
        'session',
        'year'
    ];

    private const REQUIRED_BREAKDOWN_FIELDS = [
        'application',
        'Application',
        'fee',
        'custom_amount'
    ];

    public function createStuWithBasicInfo(array $data): array
    {
        $requestId = uniqid('create_');

        try {
            Log::info('Starting student and breakdown creation', [
                'request_id' => $requestId,
                'data' => $data
            ]);

            $this->validateData($data);

            $student = $this->createStudent($data);
            Log::info('Student created', [
                'request_id' => $requestId,
                'student_id' => $student->id
            ]);

            // Create breakdown data
            $breakdownData = [
                'head_id' => $data['application'],
                'app_details1' => $data['Application'],
                'app_details2' => null,
                'app_details3' => null,
                'custom_amount' => $data['custom_amount'],
                'doc_numbers' => 1,
                'paper_numbers' => 1,
                'payable' => $data['fee']
            ];

            // Debug log to check data before creation
            Log::info('Attempting to create breakdown with data:', [
                'request_id' => $requestId,
                'student_id' => $student->id,
                'breakdown_data' => $breakdownData
            ]);

            $breakdown = BasicInfoBreakdown::create(array_merge(
                $breakdownData,
                ['student_id' => $student->id]
            ));

            Log::info('Breakdown created', [
                'request_id' => $requestId,
                'breakdown_id' => $breakdown->id
            ]);

            return [$student, $breakdown];

        } catch (InvalidArgumentException $e) {
            Log::error('Validation failed', [
                'request_id' => $requestId,
                'error' => $e->getMessage()
            ]);
            throw $e;
        } catch (ModelNotFoundException $e) {
            Log::error('Model not found', [
                'request_id' => $requestId,
                'error' => $e->getMessage()
            ]);
            throw $e;
        } catch (Exception $e) {
            Log::error('Failed to create student or breakdown', [
                'request_id' => $requestId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    private function validateData(array $data): void
    {
        foreach (self::REQUIRED_STUDENT_FIELDS as $field) {
            if (empty($data[$field])) {
                throw new InvalidArgumentException("Missing required field: {$field}");
            }
        }

        foreach (self::REQUIRED_BREAKDOWN_FIELDS as $field) {
            if (!array_key_exists($field, $data)) {
                throw new InvalidArgumentException("Missing required field: {$field}");
            }
        }

        if (!is_numeric($data['fee']) || $data['fee'] < 0) {
            throw new InvalidArgumentException('Invalid fee value');
        }
    }

    private function createStudent(array $data): Student
    {
        $studentData = array_intersect_key($data, array_flip(self::REQUIRED_STUDENT_FIELDS));
        return Student::create($studentData);
    }
}