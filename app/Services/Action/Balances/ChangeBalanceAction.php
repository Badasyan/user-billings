<?php

namespace App\Services\Action\Balances;

use App\Events\Logs\CreateLogEvent;
use App\Exceptions\InvalidCurrencyException;
use App\Models\Balances\Balance;
use App\Models\Currency;
use App\Repositories\Write\Balances\BalancesWriteRepositoryInterface;
use App\Services\DTO\Balances\ChangeBalanceDTO;
use phpseclib3\Exception\InsufficientSetupException;

class ChangeBalanceAction
{
    public function __construct(
        private BalancesWriteRepositoryInterface $balancesWriteRepository
    )
    {
    }

    /**
     * @throws InvalidCurrencyException
     */
    public function run(ChangeBalanceDTO $dto): bool
    {
        $finalResult = '';
        $currency_value = Currency::where('char_code', $dto->currency)->first();
        if (!$currency_value) {
            throw new InvalidCurrencyException('Currency not found');
        }
        $userBalance = Balance::query()->where(['user_id' => $dto->user_id])->first();

        if ($dto->status == 'decrease' && $userBalance->amount < $dto->amount) {
            throw new InsufficientSetupException('Insufficient funds');
        } elseif ($dto->status == 'decrease') {
            $finalResult = $userBalance->amount - $dto->amount;
        } elseif ($dto->status == 'increase') {
            $finalResult = $userBalance->amount + $dto->amount;
        }

        $data = [
            'user_id' => $dto->user_id,
            'currency_value' => $dto->currency,
            'amount' => $finalResult,
            'rub_value' => $currency_value->value * $dto->amount,
        ];
        $balance = $this->balancesWriteRepository->fill($data);

        $data['status'] = $dto->status;
        $data['currency'] = $dto->currency;

        CreateLogEvent::dispatch($data);

        return $balance;
    }
}
