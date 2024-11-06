<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentProviderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Validation rules for the 'payment_method_name' field
            'payment_method_name' => 'required|string|max:255',

            // Validation rules for the 'website' field
            'website' => 'required|url|max:255',

            // 'event_id' should exist in the events table
            'event_id' => 'required|exists:events,id',

            // 'company_id' should exist in the companies table
            'company_id' => 'required|exists:companies,id',

            // Optional: Validation rules for the status field
            'status' => 'nullable|in:pending,approved,rejected',
        ];
    }

    /**
     * Customize the error messages for validation failures.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'payment_method_name.required' => 'The payment method name is required.',
            'website.required' => 'The website URL is required.',
            'website.url' => 'The website URL must be a valid URL.',
            'event_id.required' => 'The event is required.',
            'event_id.exists' => 'The selected event is invalid.',
            'company_id.required' => 'The company is required.',
            'company_id.exists' => 'The selected company is invalid.',
            'status.in' => 'The status must be one of the following: pending, approved, rejected.',
        ];
    }
}
