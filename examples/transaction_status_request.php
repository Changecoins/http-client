<?php

declare(strict_types=1);

use ChangeCoins\ClientFacade;
use ChangeCoins\Dto\TransactionDto;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFacade = new ClientFacade(new RequestConfig('publicKey', 'secretKey'));
$client       = $clientFacade->createClient();

try {
    $transactionDto = new TransactionDto();
    $transactionDto
        ->setExternalId('your-internal-id')
        ->setNonce(time());

    $result = $client->transactionStatus($transactionDto)->toArray();

    // Your business logic
} catch (ResponseValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
