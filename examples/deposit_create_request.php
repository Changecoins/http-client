<?php

declare(strict_types=1);

use ChangeCoins\ClientFacade;
use ChangeCoins\Dto\DepositDto;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFacade = new ClientFacade(new RequestConfig('secretKey', 'publicKey'));
$client       = $clientFacade->createClient();

try {
    $depositDto = new DepositDto();
    $depositDto
        ->setExternalId('your-external-id')
        ->setCurrency('LTC')
        ->setNonce(time());

    $result = $client->depositCreate($depositDto)->toArray();

    // Your business logic
} catch (ResponseValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
