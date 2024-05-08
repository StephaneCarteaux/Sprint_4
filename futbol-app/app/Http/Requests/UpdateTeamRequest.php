<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTeamRequest extends FormRequest
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
        $league_id = request()->get('league_id');
        $teamId = request()->get('id');

        return [
            'name' => [
                'required',
                Rule::unique('teams')->ignore($teamId)->where(function ($query) use ($league_id) {
                    return $query->where('league_id', $league_id);
                })
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'Ese nombre ya existe en esta liga.',
        ];
    }
}
