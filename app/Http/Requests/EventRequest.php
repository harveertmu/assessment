<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            // 'name' => 'required|string|max:255',
            // 'location' => 'required|in:Malta,Brazil,Africa,Asia,East Europe,Eurasia',
            // 'date' => 'required|date',
            // 'description' => 'required|string',
            'name.required' => 'The event name is required.',
            'date.required' => 'The event date is required.',
            'date.after' => 'The event date must be a future date.',
            'location.required' => 'The event location is required.',
            'description.max' => 'The event description may not be greater than 500 characters.',
        ];
    }
}
