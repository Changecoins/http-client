# PHP ChangeCoins http-client

## Client usage

To initialize **http-client** you should provide your `secretKey` and `publicKey`.
If you do not have them, you can connect with us [tech@changecoins.io](mailto:tech@changecoins.io).

To initialize http-client you should provide your `secretKey` and `publicKey`.

```php
<?php

declare(strict_types=1);

namespace App;

use ChangeCoins\ClientFacade;
use ChangeCoins\Factory\RequestConfig;

...

$clientFacade = new ClientFacade(new RequestConfig('secretKey', 'publicKey'));
$client       = $clientFacade->createClient();
```

## Request examples

```php
<?php

...

$balanceDto = new BalanceDto();
$balanceDto->setNonce(time());

$result = $client->getBalance($balanceDto)->toArray();
```
> All request examples you can find [here](https://github.com/changecoins/php-client).

## Validation errors

Please, note, that current API doesn't correspond to all existing RESTFull API requirements.
The responses are unusual (not HTTP status codes) when an error occurs as a result of validation.
Response HTTP status code will be 200 and the response body:
```json
{
    "err_code": 102,
    "err_description": "error description"
}
```

If the server will return a validation error, the client will throw `ResponseValidationException`.
This type of exception extends `\RuntimeException` class
You can find out how does our API works [here](https://documenter.getpostman.com/view/13288095/TVsvfS6E).
