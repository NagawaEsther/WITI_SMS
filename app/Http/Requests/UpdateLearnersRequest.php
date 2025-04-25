<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Student;
use Illuminate\Validation\Rule;

class UpdateLearnersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    // public function rules()
    // {
    //     return [
    //     ];
    // }

    public function rules()
{
    return [
        // 'user_id' => 'required|integer|exists:users,id',
        'reg_number' => 
            'required',
            Rule::unique('students')->ignore($this->student->id),

        'admission_date' => 'required|date',
        'status' => 'required|in:active,graduated,dropped',
        'cohort_id' => 'required|integer|exists:cohorts,id',
        'created_by' => 'required|integer|exists:users,id',
        'student_application_id' => 'required|integer|exists:student_applications,id'
    ];
}

    
}
