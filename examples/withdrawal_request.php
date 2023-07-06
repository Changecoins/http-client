<?php

declare(strict_types=1);

use ChangeCoins\ClientFacade;
use ChangeCoins\Dto\WithdrawalDto;
use ChangeCoins\Dto\UserDataDto;
use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFacade = new ClientFacade(new RequestConfig('publicKey', 'secretKey'));
$client       = $clientFacade->createClient();

try {
    $userDataDto = new UserDataDto();
    $userDataDto->setPayee('receiver-address');

    $withdrawalDto = new WithdrawalDto();
    $withdrawalDto
        ->setExternalId('your-internal-id')
        ->setAmount(0.01)
        ->setCurrency('LTC')
        ->setUserData($userDataDto)
        ->setNonce(time());

    $result = $client->createWithdrawal($withdrawalDto)->toArray();

    // Your business logic
} catch (ResponseValidationException $exception) {
    echo sprintf('Error msg: %s. Error code: %s.', $exception->getMessage(), $exception->getCode());
}
