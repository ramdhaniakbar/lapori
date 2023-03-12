<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title_report' => ['required', 'string', 'max:255'],
            'body_report' => ['required', 'string'],
            'incident_date' => ['required', 'date'],
            'location_incident' => ['required', 'string'],
            'report_image' => ['image', 'max:2048', 'mimes:jpg,png'],
        ];
    }
}
