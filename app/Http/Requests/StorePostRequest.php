<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
    public function rules(): array {
        return [
            "title"=>["required","min:3","unique:posts",],
            "description"=>["required", "min:5"],
            "image"=>["required", "image", "max:2048"] , 
            "post_creator_id"=>[
                "required",
                Rule::exists("post_creators", "id"),
            ],
        ];
    }
}
