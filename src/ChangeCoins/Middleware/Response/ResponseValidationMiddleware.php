<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware\Response;

use ChangeCoins\Exception\ResponseValidationException;
use ChangeCoins\Handler\ResponseHandlerInterface;
use ChangeCoins\Request\ResponseInterface;
use ChangeCoins\Middleware\ResponseMiddlewareInterface;

class ResponseValidationMiddleware implements ResponseMiddlewareInterface
{
    /**
     * @inheritDoc
     */
    public function process(ResponseInterface $response, ResponseHandlerInterface $handler): ResponseInterface
    {
        $responseData = $response->toArray();

        if (array_key_exists('err_code', $responseData)) {
            throw new ResponseValidationException($responseData['err_description'], $responseData['err_code']);
        }

        return $handler->handle($response);
    }
}
