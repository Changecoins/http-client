<?php

declare(strict_types=1);

namespace ChangeCoins\Message;

use ChangeCoins\Exception\ClientException;
use ChangeCoins\Exception\RedirectionException;
use ChangeCoins\Exception\ServerException;

trait CommonResponseTrait
{
    /**
     * @throws ServerException
     * @throws ClientException
     * @throws RedirectionException
     */
    private function checkStatusCode(): void
    {
        $code = $this->getInfo('http_code');

        if (500 <= $code) {
            throw new ServerException($this);
        }

        if (400 <= $code) {
            throw new ClientException($this);
        }

        if (300 <= $code) {
            throw new RedirectionException($this);
        }
    }
}
