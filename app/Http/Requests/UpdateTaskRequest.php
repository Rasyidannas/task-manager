<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //sometimes is for we can leave it out of the request
        return [
            "title" => "sometimes|required|max:255",
            "is_done" => "sometimes|boolean",
            "project_id" => [
                "nullable",
                // this is for user is member of project
                Rule::in(Auth::user()->memberships->pluck('id'))
            ]
        ];
    }
}
