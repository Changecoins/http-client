<?php

declare(strict_types=1);

use ChangeCoins\ClientFacade;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFacade = new ClientFacade(new RequestConfig('secretKey', 'publicKey'));
$client       = $clientFacade->createClient();

try {
    $result = $client->getRates()->toArray();

    echo json_encode($result, JSON_PRETTY_PRINT);
} catch (ResponseValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
