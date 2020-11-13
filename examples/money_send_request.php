<?php

declare(strict_types=1);

use ChangeCoins\ClientFacade;
use ChangeCoins\Dto\OutcomeSendDto;
use ChangeCoins\Dto\UserDataDto;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFacade = new ClientFacade(new RequestConfig('secretKey', 'publicKey'));
$client       = $clientFacade->createClient();

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
