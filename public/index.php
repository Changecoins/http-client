<?php

declare(strict_types=1);

use ChangeCoins\ApiClient;
use ChangeCoins\Factory\ClientFactory;
use ChangeCoins\Factory\RequestConfig;

require dirname(__DIR__) . '/vendor/autoload.php';

$clientFactory = new ClientFactory(new RequestConfig('secretKey', 'publicKey'));

$client = new ApiClient($clientFactory);

var_dump($client->getRates()->toArray());die;
