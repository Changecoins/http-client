<?php

declare(strict_types=1);

use ChangeCoins\ClientFacade;
use ChangeCoins\Dto\InvoiceDto;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFacade = new ClientFacade(new RequestConfig('publicKey', 'secretKey'));
$client       = $clientFacade->createClient();

try {
    $invoiceDto = new InvoiceDto();
    $invoiceDto
        ->setExternalId('your-internal-id')
        ->setAmount(0.01)
        ->setCurrency('LTC')
        ->setReturnUrl('https://your-domain.io/return-url')
        ->setCallbackUrl('https://your-domain.io/calback-url')
        ->setNonce(time());

    $response = $client->invoiceCreate($invoiceDto)->toArray();

    // Your business logic
} catch (ResponseValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
