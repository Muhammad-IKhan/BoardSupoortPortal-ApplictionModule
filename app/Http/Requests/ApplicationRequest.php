<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'student_id' => 'required|exists:students,id',
            'breakdown_id' => 'required|exists:breakdowns,id',
            'head_id' => 'required|exists:heads,id',
            // Add other validation rules
        ];
    }
}