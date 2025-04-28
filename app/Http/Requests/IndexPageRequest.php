<?php

namespace App\Http\Requests;

use App\Models\{Head,};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Http\Requests\helper\FeeCalculator;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;




class IndexPageRequest extends FormRequest
{
    private $feeCalculator;
    
    public function __construct(FeeCalculator $feeCalculator)
    {
        parent::__construct();
        $this->feeCalculator = $feeCalculator;
    }

   
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        try {
            $data = $this->all();//name, fater_name, roll_number, class, // session, year // application(ForFee) |custom_amout |document or paper_count ifSelected

            Log::info('Preparing validation data started', ['input' => $data]);
            if (!isset($data['application'])) {
                throw new InvalidArgumentException('application ID is required');
                echo "application id posting from index page to index page request problem ";
            }
            $application = Head::findOrFail($data['application']);

            $feeCalculated = $this->feeCalculator->calculateAmong3($data, $application);

            $doc_paper_custom_amount = max($data['document_count'] ?? 1, $data['paper_count'] ?? 1, $data['custom_amount'] ?? 0);
            $this->merge([
                'Application' => $application->head_name,
                'fee' => $feeCalculated,
                'doc_paper_custom_amount' => $doc_paper_custom_amount,
            ]);
            Log::info('Data preparation completed', ['merged_data' => $this->all()]);

        } catch (\Exception $e) {
            Log::error('Error in prepareForValidation', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'data' => $data ?? null
            ]);
            throw $e;

        }
    }
   public function rules(): array
{
    return [
        // Student Information
        'name' => ['required', 'string', 'max:255'],
        'father_name' => ['required', 'string', 'max:255'], 
        'roll_number' => ['required', 'string'],
        'class' => ['required', 'string'],

        // Academic Information
        'session' => ['required', 'string'],
        'year' => ['required', 'integer', 'min:1900'], 

        // Application Details
        'application' => ['required', Rule::exists('heads', 'id')], 
        'document_count' => ['required_if:application,2,3', 'nullable', 'integer', 'min:1'],
        'paper_count' => ['required_if:application,10,19', 'nullable', 'integer', 'min:1'],
        'custom_amount' => ['required_if:application,17', 'nullable', 'integer'],

        // Merging Calculated Fields
        'Application' => ['required', 'string'],
        'fee' => ['required', 'numeric', 'min:0'],
        'doc_paper_custom_amount' => ['required_if:application,2,3,10,19,17', 'integer', 'min:1'],
    ];
}

public function messages(): array
{
    return [
        'name.required' => 'Student name is required.',
        'father_name.required' => 'Father\'s name is required.', 
        'roll_number.required' => 'Roll number is required.',
        'class.required' => 'Class information is required.',
        'session.required' => 'Session information is required.',
        'year.required' => 'Year must be specified.',
        'application.required' => 'Please select an application type.', 
        'application.exists' => 'Selected application type is invalid.',
        'document_count.required_if' => 'Number of documents is required for this application type.',
        'paper_count.required_if' => 'Number of papers is required for this application type.',
        'custom_amount.required_if' => 'Custom amount is required for this application type.', 
        'Application.required' => 'Application field is required.', 
        'doc_paper_custom_amount.required-if' => 'Please specify the number of papers/documents.',
        'fee' => 'Application fee is required.', 
        'fee.min' => 'Application fee cannot be negative.', 
    ];
}


    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        Log::warning('Validation failed', [
            'errors' => $validator->errors()->toArray(),
            'input' => $this->all()
        ]);
        
        parent::failedValidation($validator);
    }
}