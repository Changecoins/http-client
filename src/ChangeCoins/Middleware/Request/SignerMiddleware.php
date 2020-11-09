<?php

declare(strict_types=1);

namespace ChangeCoins\Middleware\Request;

use ChangeCoins\Handler\RequestHandlerInterface;
use ChangeCoins\Message\RequestInterface;
use ChangeCoins\Middleware\RequestMiddlewareInterface;

class SignerMiddleware implements RequestMiddlewareInterface
{
    /**
     * @var string
     */
    private $secretKey;

    /**
     * @var string
     */
    private $publicKey;

    /**
     * @param string $secretKey
     * @param string $publicKey
     */
    public function __construct(string $secretKey, string $publicKey)
    {
        $this->secretKey = $secretKey;
        $this->publicKey = $publicKey;
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

        return $request;
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
