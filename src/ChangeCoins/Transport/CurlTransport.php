<?php

declare(strict_types=1);

namespace ChangeCoins\Transport;

use ChangeCoins\Exception\ConfigurationException;
use ChangeCoins\Factory\RequestConfig;
use ChangeCoins\Message\HttpRequest;
use ChangeCoins\Message\HttpResponse;
use ChangeCoins\Message\RequestInterface;
use ChangeCoins\Message\ResponseInterface;

class CurlTransport implements TransportInterface
{
    /**
     * @var $requestConfig
     */
    private $requestConfig;

    /**
     * @param RequestConfig $requestConfig
     */
    public function __construct(RequestConfig $requestConfig)
    {
        if (!function_exists("curl_init")) {
            throw new ConfigurationException("Curl module is not available on this system");
        }

        $this->requestConfig = $requestConfig;
    }

    /**
     * @inheritDoc
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $ch = curl_init();
        curl_setopt_array($ch, array_replace($this->requestConfig->getOptions(), $request->getOptions()));
        curl_setopt($ch, CURLOPT_URL, $request->getFullUrl());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request->getHeaders());

        if ($request->getMethod() === HttpRequest::METHOD_POST) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request->getBody()));
        }

        $result = curl_exec($ch);
        curl_close($ch);

        return new HttpResponse($result ?: '', $ch);
    }
}
