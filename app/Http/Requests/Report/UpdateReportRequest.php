<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportRequest extends FormRequest
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
            'title_report' => ['string', 'max:255'],
            'body_report' => ['string'],
            'incident_date' => ['date'],
            'location_incident' => ['string'],
            'report_image' => ['image', 'max:2048', 'mimes:jpg,png'],
        ];
    }
}
