<?php
namespace common\helpers;

use imanilchaudhari\CurrencyConverter\CurrencyConverter;
use imanilchaudhari\CurrencyConverter\Provider\OpenExchangeRatesApi;


class MyCurrencyConverter extends CurrencyConverter{


    public function getRateProvider()
    {

        if (!$this->rateProvider) {
            $this->setRateProvider(new OpenExchangeRatesApi([
                'appId' => env('openExchangeRateAppId'),
            ]));
        }
        return $this->rateProvider;
    }


}

?>