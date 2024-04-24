<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessCardRequest extends FormRequest
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
        return [
            "business_name" => ["required", "max:255"],
            "contact_first_name",
            "contact_middle_name",
            "contact_last_name",
            "address_1",
            "address_2",
            "city",
            "state",
            "zip",
            "phone_1",
            "phone_2",
            "fax",
            "email",
            "email_2",
            "website",
            "picture_url",
            "industry",
            "sub_industry",
            "notes"
        ];
    }
}
