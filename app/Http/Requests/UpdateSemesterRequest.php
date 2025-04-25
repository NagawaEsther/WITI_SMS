<?php

namespace App\Http\Requests;
use App\Models\Semester;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSemesterRequest extends FormRequest
{
    public function authorize()
    {
        return true; // or add your authorization logic
    }

    public function rules()
    {
        $rules = Semester::$rules;
        return $rules;
    }
}
