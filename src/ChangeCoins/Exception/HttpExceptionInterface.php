<?php

declare(strict_types=1);

namespace ChangeCoins\Exception;

use ChangeCoins\Message\RequestInterface;

/**
 * Base interface for HTTP-related exceptions.
 */
interface HttpExceptionInterface extends ExceptionInterface
{
    /**
     * @return RequestInterface
     */
    public function getResponse(): RequestInterface;
}
