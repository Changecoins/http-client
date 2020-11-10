<?php

declare(strict_types=1);

use ChangeCoins\ApiClient;
use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Exception\ValidationException;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$client = new ApiClient(new RequestConfig('secretKey', 'publicKey'));

try {
//    $balanceDto = new BalanceDto();
//    $balanceDto->setNonce(time());
//    $result = $client->getBalance($balance)->toArray();

    $result = $client->getRates()->toArray();
    echo json_encode($result, JSON_PRETTY_PRINT);
} catch (ValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
