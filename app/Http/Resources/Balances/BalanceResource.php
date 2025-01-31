<?php

namespace App\Http\Resources\Balances;

use Illuminate\Http\Resources\Json\JsonResource;

class BalanceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'balance' => $this->resource->amount,
            'currency' => $this->resource->currency,
        ];
    }
}
