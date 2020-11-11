<?php

declare(strict_types=1);

use ChangeCoins\ApiClient;
use ChangeCoins\Dto\DepositDto;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\ClientFactory;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFactory = new ClientFactory(new RequestConfig('secretKey', 'publicKey'));
$client        = new ApiClient($clientFactory);

try {
    $depositDto = new DepositDto();
    $depositDto
        ->setExternalId('your-external-id')
        ->setAmount(100.00)
        ->setCurrency('USD')
        ->setNonce(time());

    $result = $client->depositCreate($depositDto)->toArray();
} catch (ResponseValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
