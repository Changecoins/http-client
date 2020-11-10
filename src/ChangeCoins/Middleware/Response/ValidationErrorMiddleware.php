<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware\Response;

use ChangeCoins\Exception\ValidationException;
use ChangeCoins\Handler\ResponseHandlerInterface;
use ChangeCoins\Request\ResponseInterface;
use ChangeCoins\Middleware\ResponseMiddlewareInterface;

class ValidationErrorMiddleware implements ResponseMiddlewareInterface
{
    /**
     * @inheritDoc
     */
    public function process(ResponseInterface $response, ResponseHandlerInterface $handler): ResponseInterface
    {
        $responseData = $response->toArray();

        if (array_key_exists('err_code', $responseData)) {
            throw new ValidationException($responseData['err_description'], $responseData['err_code']);
        }

        return $handler->handle($response);
    }
}
