<?php

declare(strict_types=1);

use ChangeCoins\ClientFacade;
use ChangeCoins\Dto\RateDto;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFacade = new ClientFacade(new RequestConfig('publicKey', 'secretKey'));
$client       = $clientFacade->createClient();

try {
    $rateDto = new RateDto();
    $rateDto
        ->setCurrencyFrom('BTC')
        ->setCurrencyTo('USD')
        ->setNonce(time());

    $result = $client->getRates($rateDto)->toArray();

    // Your business logic
} catch (ResponseValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
