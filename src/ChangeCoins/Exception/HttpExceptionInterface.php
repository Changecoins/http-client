<?php

declare(strict_types=1);

namespace ChangeCoins\Exception;

use ChangeCoins\Message\ResponseInterface;

/**
 * Base interface for HTTP-related exceptions.
 */
interface HttpExceptionInterface extends ExceptionInterface
{
    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface;
}
