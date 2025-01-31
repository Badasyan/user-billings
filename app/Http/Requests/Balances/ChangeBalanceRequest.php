<?php

namespace App\Http\Requests\Balances;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ChangeBalanceRequest extends FormRequest
{
    public const AMOUNT = 'amount';
    public const CURRENCY = 'currency';
    public const STATUS = 'status';

    public function rules(): array
    {
        return [
            self::AMOUNT => [
                'required',
                'numeric',
                'min:1',
            ],
            self::CURRENCY => [
                'required',
                'string',
            ],
            self::STATUS => [
                'required',
                'string',
                Rule::in('increase', 'decrease'),
            ]
        ];
    }

    public function getAmount(): int
    {
        return $this->input(self::AMOUNT);
    }

    public function getCurrency(): string
    {
        return $this->input(self::CURRENCY);
    }

    public function getUserId()
    {
        return $this->route('user_id');
    }

    public function getStatus(): string{
        return $this->input(self::STATUS);
    }
}
