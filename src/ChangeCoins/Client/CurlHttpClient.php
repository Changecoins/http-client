<?php

declare(strict_types=1);

namespace ChangeCoins\Client;

use ChangeCoins\Exception\ConfigurationException;
use ChangeCoins\Message\CurlHttpRequest;
use ChangeCoins\Message\CurlHttpResponse;
use ChangeCoins\Message\RequestInterface;
use ChangeCoins\Message\ResponseInterface;
use ChangeCoins\Middleware\HandlerRequestInterface;

class CurlHttpClient implements HttpClientInterface
{
    /**
     * @var HandlerRequestInterface
     */
    private $handler;

    /**
     * @var array
     */
    private $defaultOptions;

    /**
     * @param array $defaultOptions
     */
    public function __construct(array $defaultOptions, HandlerRequestInterface $handler = null)
    {
        if (!function_exists("curl_init")) {
            throw new ConfigurationException("Curl module is not available on this system");
        }

        $this->defaultOptions = $defaultOptions;
    }

    /**
     * @inheritDoc
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        if ($this->handler !== null) {
            $this->handler->handle($request);
        }

        $ch = curl_init();
        curl_setopt_array($ch, $request->getOptions());
        curl_setopt($ch, CURLOPT_URL, $request->getUrl());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request->getHeaders());

        switch ($request->getMethod()) {
            case CurlHttpRequest::METHOD_POST:
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request->getBody()));
                break;
            case CurlHttpRequest::METHOD_GET:
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($request->getBody()));
                break;
        }

        $result = curl_exec($ch);

        return new CurlHttpResponse($result, $ch);
    }
}
