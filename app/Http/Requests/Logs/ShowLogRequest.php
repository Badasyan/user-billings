<?php

namespace App\Http\Requests\Logs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ShowLogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [];
    }

    public function show(): string
    {
        return $this->route('user_id');
    }

}
