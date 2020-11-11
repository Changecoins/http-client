<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware\Request;

use ChangeCoins\Handler\RequestHandlerInterface;
use ChangeCoins\Request\RequestInterface;
use ChangeCoins\Middleware\RequestMiddlewareInterface;

class RequestSignerMiddleware implements RequestMiddlewareInterface
{
    /**
     * @var string
     */
    private $publicKey;

    /**
     * @var string
     */
    private $secretKey;

    /**
     * @param string $publicKey
     * @param string $secretKey
     */
    public function __construct(string $publicKey, string $secretKey)
    {
        $this->publicKey = $publicKey;
        $this->secretKey = $secretKey;
    }

    /**
     * @inheritDoc
     */
    public function process(RequestInterface $request, RequestHandlerInterface $handler): RequestInterface
    {
        $request
            ->withHeader('X-Processing-Key', $this->publicKey)
            ->withHeader('X-Processing-Payload', $this->cratePayload($request))
            ->withHeader('X-Processing-Signature', $this->createSignature($request));

        return $handler->handle($request);
    }

    /**
     * @param RequestInterface $request
     *
     * @return string
     */
    private function createSignature(RequestInterface $request): string
    {
        return hash_hmac('sha256', $this->cratePayload($request), $this->secretKey);
    }

    /**
     * @param RequestInterface $request
     *
     * @return string
     */
    private function cratePayload(RequestInterface $request): string
    {
        return base64_encode(json_encode($request->getBody(), JSON_UNESCAPED_SLASHES));
    }
}
