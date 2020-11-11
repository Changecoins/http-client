<?php

declare(strict_types=1);

use ChangeCoins\ApiClient;
use ChangeCoins\Dto\InvoiceDto;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\ClientFactory;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFactory = new ClientFactory(new RequestConfig('secretKey', 'publicKey'));
$client        = new ApiClient($clientFactory);

try {
    $invoiceDto = new InvoiceDto();
    $invoiceDto
        ->setExternalId('your-internal-id')
        ->setAmount(100.00)
        ->setCurrency('USD')
        ->setReturnUrl('https://your-domain.io/return-url')
        ->setNonce(time());

    $response = $client->invoiceCreate($invoiceDto)->toArray();
} catch (ResponseValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
