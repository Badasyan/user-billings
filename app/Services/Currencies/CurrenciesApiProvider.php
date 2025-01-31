<?php

namespace App\Services\Currencies;

class CurrenciesApiProvider
{
    public function getCurrencies()
    {
        static $rates;

        if (!$rates) {
            $rates = json_decode(file_get_contents('https://www.cbr-xml-daily.ru/daily_json.js'));
        }

        return $rates;
    }
}
