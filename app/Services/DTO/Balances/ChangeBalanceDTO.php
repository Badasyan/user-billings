<?php

namespace App\Services\DTO\Balances;

use App\Http\Requests\Balances\ChangeBalanceRequest;
use Spatie\LaravelData\Data;

class ChangeBalanceDTO extends Data
{
    public int $amount;
    public string $currency;
    public string $status;
    public string $user_id;

    public static function fromRequest(ChangeBalanceRequest $request): self
    {
        return self::from([
            'amount' => $request->getAmount(),
            'currency' => $request->getCurrency(),
            'user_id' => $request->getUserId(),
            'status' => $request->getStatus(),
        ]);
    }
}
