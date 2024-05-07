<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
            'league_id' => 'required',
            'game_number' => 'required|integer',
            'date' => 'required|date',
            'team1_id' => 'required',
            'team2_id' => 'required',
            'team1_goals' => 'required|integer',
            'team2_goals' => 'required|integer',
        ];
    }
}
