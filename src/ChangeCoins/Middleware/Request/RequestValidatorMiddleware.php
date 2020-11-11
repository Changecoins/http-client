<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware\Request;

use ChangeCoins\Exception\RequestValidationException;
use ChangeCoins\Handler\RequestHandlerInterface;
use ChangeCoins\Middleware\RequestMiddlewareInterface;
use ChangeCoins\Request\RequestInterface;
use ChangeCoins\Storage\StorageInterface;

class RequestValidatorMiddleware implements RequestMiddlewareInterface
{
    /**
     * @var StorageInterface
     */
    private $requestValidatorStorage;

    /**
     * @param StorageInterface $requestValidatorStorage
     */
    public function __construct(StorageInterface $requestValidatorStorage)
    {
        $this->requestValidatorStorage = $requestValidatorStorage;
    }

    /**
     * @inheritDoc
     */
    public function process(RequestInterface $request, RequestHandlerInterface $handler): RequestInterface
    {
        if ($this->requestValidatorStorage->exists($request->getUrl())) {
            $validator = $this->requestValidatorStorage->get($request->getUrl());

            if ($validator !== null) {
                $validator->validate($request);

                if ($validator->hasErrors()) {
                    throw new RequestValidationException(implode('; ', $validator->getErrors()));
                }
            }
        }

        return $handler->handle($request);
    }
}
