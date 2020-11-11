<?php

declare(strict_types=1);

use ChangeCoins\ApiClient;
use ChangeCoins\Dto\OutcomeSendDto;
use ChangeCoins\Dto\UserDataDto;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\ClientFactory;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFactory = new ClientFactory(new RequestConfig('secretKey', 'publicKey'));
$client        = new ApiClient($clientFactory);

try {
    $userDataDto = new UserDataDto();
    $userDataDto->setPayee('user-payee');

    $moneySendDto = new OutcomeSendDto();
    $moneySendDto
        ->setExternalId('your-internal-id')
        ->setAmount(200.00)
        ->setCurrency('USD')
        ->setUserdata($userDataDto)
        ->setNonce(time());

    $result = $client->moneySend($moneySendDto)->toArray();
} catch (ResponseValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
