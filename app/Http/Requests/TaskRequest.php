<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'task' => 'required|nullable|unique:tasks',
        ];
    }
    public function messages()
    {
        return [

            'task.required' => 'you have to write a task',
            'task.unique' => 'you already have this task',
            ];
    }
}
