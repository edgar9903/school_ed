<?php

namespace App\Http\Requests\Admin\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'weekdays' => 'required|integer|between:1,5',
            'teacher' => 'required|exists:teachers,id',
            'classroom' => 'required|exists:classrooms,id',
            'lesson' => 'required|exists:lessons,id',
            'start' => 'required|date_format:H:i',
            'end' => 'required|date_format:H:i|after:start',
        ];
    }
}
