<?php

declare(strict_types=1);

use ChangeCoins\ApiClient;
use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\ClientFactory;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFactory = new ClientFactory(new RequestConfig('secretKey', 'publicKey'));
$client        = new ApiClient($clientFactory);

try {
    $balanceDto = new BalanceDto();
    $balanceDto->setNonce(time());

    $result = $client->getBalance($balanceDto)->toArray();
} catch (ResponseValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
