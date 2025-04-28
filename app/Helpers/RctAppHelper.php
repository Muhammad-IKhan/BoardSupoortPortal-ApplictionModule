<?php

namespace App\Helpers;

use App\Models\{Student, BasicInfoBreakdown, Receipt, Application}; 
use App\Services\RGeneratingService;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class RctAppHelper
{   
    public function __construct(private readonly RGeneratingService $rGeneratingService) {}

   
    private const REQUIRED_RECEIPT_FIELDS = [
        'fee',  // these should be as incomming data to match 
        'Application',  
        // 'application',  

    ];

    private const REQUIRED_APPLICATION_FIELDS = [
        'primary_details', 
        'secondary_details',
        'additional_notes', 
        'additional_notes_2',
    ];
    

    // Static and deep nested applications data structures for learning / testing
    private const APPLICATION_DATA = [
        'primary_details' => [
            'section_1' => [
                'personal' => [
                    'basic' => [
                        'name' => 'Full Name',
                        'father_name' => 'Father Name',
                        'cnic' => '12345-1234567-1',
                        'dob' => '01-01-2000',
                        'gender' => 'Male'
                    ],
                    'contact' => [
                        'phone' => '0300-1234567',
                        'email' => 'email@example.com',
                        'address' => 'Street Address',
                        'city' => 'City Name',
                        'country' => 'Country Name'
                    ],
                    'education' => [
                        'degree' => 'Degree Name',
                        'institute' => 'Institute Name',
                        'year' => '2020',
                        'grade' => 'A+',
                        'percentage' => '85%'
                    ]
                ]
            ],
            'section_2' => [
                'academic' => [
                    'details' => [
                        'roll_no' => 'Roll Number',
                        'registration' => 'Registration No',
                        'department' => 'Department',
                        'semester' => 'Current Semester',
                        'batch' => 'Batch Year'
                    ]
                ]
            ]
        ],
        'secondary_details' => [
            'documents' => [
                'required' => [
                    'submission' => [
                        'cnic_copy' => 'CNIC Copy',
                        'photos' => 'Passport Photos',
                        'domicile' => 'Domicile',
                        'matriculation' => 'Matriculation Certificate',
                        'intermediate' => 'Intermediate Certificate'
                    ]
                ]
            ],
            'verification' => [
                'status' => [
                    'document' => [
                        'verified' => 'Yes',
                        'date' => 'Verification Date',
                        'officer' => 'Verification Officer',
                        'remarks' => 'Verification Remarks',
                        'status' => 'Complete'
                    ]
                ]
            ]
        ],
        'additional_notes' => [
            'requirements' => [
                'special' => [
                    'conditions' => [
                        'condition_1' => 'Special Requirement 1',
                        'condition_2' => 'Special Requirement 2',
                        'condition_3' => 'Special Requirement 3',
                        'condition_4' => 'Special Requirement 4',
                        'condition_5' => 'Special Requirement 5'
                    ]
                ]
            ],
            'processing' => [
                'steps' => [
                    'timeline' => [
                        'step_1' => 'Processing Step 1',
                        'step_2' => 'Processing Step 2',
                        'step_3' => 'Processing Step 3',
                        'step_4' => 'Processing Step 4',
                        'step_5' => 'Processing Step 5'
                    ]
                ]
            ]
        ],
        'additional_notes_2' => [
            'instructions' => [
                'general' => [
                    'guidelines' => [
                        'guideline_1' => 'General Instruction 1',
                        'guideline_2' => 'General Instruction 2',
                        'guideline_3' => 'General Instruction 3',
                        'guideline_4' => 'General Instruction 4',
                        'guideline_5' => 'General Instruction 5'
                    ]
                ]
            ],
            'fees' => [
                'structure' => [
                    'breakdown' => [
                        'fee_1' => 'Fee Structure 1',
                        'fee_2' => 'Fee Structure 2',
                        'fee_3' => 'Fee Structure 3',
                        'fee_4' => 'Fee Structure 4',
                        'fee_5' => 'Fee Structure 5'
                    ]
                ]
            ]
        ]
    ];

    public function createRctWithApplication(Student $student, BasicInfoBreakdown $basicInfoBreakdown, array $data): array
    {
        $requestId = uniqid('create_');

        try {
            Log::info('Starting createRctWithApplication process', [
                'request_id' => $requestId,
                'data' => $data
            ]);
            // dd($data);

            // Validate input data first
            $this->validateReceiptData($data);

            // Transforming data for application fields but Used static for self testing
            $data['primary_details'] = json_encode(self::APPLICATION_DATA['primary_details']);
            $data['secondary_details'] = json_encode(self::APPLICATION_DATA['secondary_details']);
            $data['additional_notes'] = json_encode(self::APPLICATION_DATA['additional_notes']);
            $data['additional_notes_2'] = json_encode(self::APPLICATION_DATA['additional_notes_2']);

            $this->validateApplicationData($data);

            // Generate receipt number after validation
            $receiptNumber = $this->rGeneratingService->generateReceiptNumber();
            // Store data in the session
             session(compact('receiptNumber'));


            // Create receipt
            $receiptData = [
                'number' => $receiptNumber,
                'student_id' => $student->id,
                'head_id' => $basicInfoBreakdown->head_id,
                'owed_amount' => $data['fee'],
                'apply_for' => $data['Application'],
                'basic_info_breakdowns' => $basicInfoBreakdown->id  

            ];

            $receipt = Receipt::create($receiptData);
            Log::info('Receipt created', [
                'request_id' => $requestId,
                'receipt_id' => $receipt->id,
                'receipt_number' => $receiptNumber
            ]);

            // Create application
            $applicationData = [
                'student_id' => $student->id,
                'receipt_id' => $receipt->id,
                // 'primary_details' => $data['primary_details'],
                // 'secondary_details' => $data['secondary_details'],
                // 'additional_notes' => $data['additional_notes'],
                // 'additional_notes_2' => $data['additional_notes_2'],
                'primary_details' => $data['primary_details'],
                'secondary_details' => $data['secondary_details'],
                'additional_notes' => $data['additional_notes'],
                'additional_notes_2' => $data['additional_notes_2'],
            ];

            $application = Application::create($applicationData);
            Log::info('Application created', [
                'request_id' => $requestId,
                'application_id' => $application->id
            ]);

            return [$receipt, $application];

        } catch (ModelNotFoundException $e) {
            Log::error('Model not found', [
                'request_id' => $requestId,
                'error' => $e->getMessage()
            ]);
            throw $e;
        } catch (InvalidArgumentException $e) {
            Log::error('Validation failed inside RctAppHelper', [
                'request_id' => $requestId,
                'error' => $e->getMessage()
            ]);
            throw $e;
        } catch (Exception $e) {
            Log::error('Failed to create receipt or application', [
                'request_id' => $requestId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    private function validateReceiptData(array $data): void
    {
        foreach (self::REQUIRED_RECEIPT_FIELDS as $field) {
            if (!isset($data[$field]) || $data[$field] === '') {
                throw new InvalidArgumentException("Missing required field for receipt: {$field}");
            }
        }
    }

    private function validateApplicationData(array $data): void
    {
        foreach (self::REQUIRED_APPLICATION_FIELDS as $field) {
            if (!isset($data[$field]) || $data[$field] === '') {
                throw new InvalidArgumentException("Missing required field for application: {$field}");
            }
        }
    }
}