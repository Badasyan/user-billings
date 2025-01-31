<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public const NAME = 'name';
    public const AGE = 'age';
    public const PHONE = 'phone';
    public const EMAIL = 'email';
    public const PASSWORD = 'password';
//    public const PASSWORD_CONFIRMATION = 'password_confirmation';

    public function rules(): array
    {
        return [
            self::NAME => [
                'required',
                'string',
            ],
            self::AGE => [
                'nullable',
                'integer',
                'min:1',
            ],
            self::PHONE => [
                'required',
                'integer',
            ],
            self::EMAIL => [
                'required',
                'string',
            ],
            self::PASSWORD => [
                'required',
                'string',
                'min:8',
            ],
        ];
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getAge(): ?int
    {
        return $this->get(self::AGE);
    }

    public function getPhone(): string
    {
        return $this->input(self::PHONE);
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
