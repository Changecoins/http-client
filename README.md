# PHP REST API SDK for BlockCypher

## SDK usage

```php
<?php

declare(strict_types=1);

namespace App;

use ChangeCoins\ApiClient;
use ChangeCoins\Factory\RequestConfig;

...

$client = new ApiClient(new RequestConfig('secretKey', 'publicKey'));
$result = $client->getRates();
```

## Requests examples

```php
<?php

declare(strict_types=1);

namespace App;

use ChangeCoins\ApiClient;
use ChangeCoins\Dto\BalanceDto;
use ChangeCoins\Factory\RequestConfig;

...

$client = new ApiClient(new RequestConfig('secretKey', 'publicKey'));

$balanceDto = new BalanceDto();
$balanceDto->setNonce(time());

$result = $client->getBalance($balanceDto)->toArray();
```

