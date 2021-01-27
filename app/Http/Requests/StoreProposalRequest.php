<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\FormCaptcha;

class StoreProposalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'title' => ['required', 'unique:proposals', 'max:255'],
            'description' => ['required'],
        ];
    }
}
