<?php

namespace App\Jobs;

use App\Services\Currencies\CurrenciesApiProvider;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Throwable;
use Carbon\Carbon;
use App\Models\Currency;
use Illuminate\Bus\Batchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
class GetCurrenciesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, Batchable;

    public function handle(CurrenciesApiProvider $currenciesApiProvider)
    {
        try {
            $currencies = $currenciesApiProvider->getCurrencies();

            if (!$currencies) {
                return [];
            }

            $valuteData = $currencies->Valute;

            $data = [];
            foreach ($valuteData as $currencyCode => $currency) {
                $data[] = [
                    'unique_id' => $currency->ID,
                    'num_code' => $currency->NumCode,
                    'char_code' => $currency->CharCode,
                    'name' => $currency->Name,
                    'value' => $currency->Value,
                    'previous' => $currency->Previous,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ];
            }

            Currency::query()->insert($data);
        } catch (Throwable $e) {
            return [
                'status' => $e->getCode(),
                'error_message' => $e->getMessage(),
                'line' => $e->getLine()
            ];
        }
    }
}
