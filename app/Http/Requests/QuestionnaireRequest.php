<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class QuestionnaireRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return ! is_null($this->user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'a1' => ['required', 'integer', 'min:-3', 'max:3'],
            'a2' => ['required', 'integer', 'min:-3', 'max:3'],
            'a3' => ['required', 'integer', 'min:-3', 'max:3'],
            'a4' => ['required', 'integer', 'min:-3', 'max:3'],
            'a5' => ['required', 'integer', 'min:-3', 'max:3'],
            'a6' => ['required', 'integer', 'min:-3', 'max:3'],
            'a7' => ['required', 'integer', 'min:-3', 'max:3'],
            'a8' => ['required', 'integer', 'min:-3', 'max:3'],
            'a9' => ['required', 'integer', 'min:-3', 'max:3'],
            'a10' => ['required', 'integer', 'min:-3', 'max:3'],
            'a11' => ['required', 'integer', 'min:-3', 'max:3'],
            'a12' => ['required', 'integer', 'min:-3', 'max:3'],
            'a13' => ['required', 'integer', 'min:-3', 'max:3'],
            'a14' => ['required', 'integer', 'min:-3', 'max:3'],
            'a15' => ['required', 'integer', 'min:-3', 'max:3'],
            'a16' => ['required', 'integer', 'min:-3', 'max:3'],
            'a17' => ['required', 'integer', 'min:-3', 'max:3'],
            'a18' => ['required', 'integer', 'min:-3', 'max:3'],
            'gender' => ['required', Rule::in(config('form-options.gender'))],
            'race' => ['required', Rule::in(config('form-options.race'))],
            'sexual_orientation' => ['required', Rule::in(config('form-options.sexual_orientation'))],
            'religion' => ['required', Rule::in(config('form-options.religion'))],
            'language' => ['required', Rule::in(config('form-options.language'))],
            'modality' => ['required', 'array'],
            'modality.*' => [Rule::in(config('form-options.modality'))],
            'orientation' => ['required', 'array'],
            'orientation.*' => [Rule::in(config('form-options.orientation'))],
            'number_of_sessions' => ['required', Rule::in(config('form-options.number_of_sessions'))],
            'length_of_sessions' => ['required', Rule::in(config('form-options.length_of_sessions'))],
            'frequency_of_sessions' => ['required', Rule::in(config('form-options.frequency_of_sessions'))],
            'medication_preference' => ['required', Rule::in(config('form-options.medication_preference'))],
            'therapy_addition' => ['required', 'array'],
            'therapy_addition.*' => [Rule::in(config('form-options.therapy_addition'))],
            'other_personal_characteristics' => ['nullable', 'string', 'min:2', 'max:5000'],
            'strong_preferences' => ['nullable', 'string', 'min:2', 'max:5000'],
            'dislikes' => ['nullable', 'string', 'min:2', 'max:5000'],
        ];
    }
}
