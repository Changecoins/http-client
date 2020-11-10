<?php

declare(strict_types=1);

namespace ChangeCoins\Transport;

use ChangeCoins\Exception\ConfigurationException;
use ChangeCoins\Factory\RequestConfig;
use ChangeCoins\Request\HttpRequest;
use ChangeCoins\Request\HttpResponse;
use ChangeCoins\Request\RequestInterface;
use ChangeCoins\Request\ResponseInterface;

class CurlTransport implements TransportInterface
{
    /**
     * @var $requestConfig
     */
    private $requestConfig;

    /**
     * @var resource
     */
    private $curl;

    /**
     * @param RequestConfig $requestConfig
     */
    public function __construct(RequestConfig $requestConfig)
    {
        if (!function_exists("curl_init")) {
            throw new ConfigurationException("Curl module is not available on this system");
        }

        $this->requestConfig = $requestConfig;
        $this->curl          = curl_init();
    }

    /**
     * @inheritDoc
     */
    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        curl_setopt_array($this->curl, array_replace($this->requestConfig->getOptions(), $request->getOptions()));
        curl_setopt($this->curl, CURLOPT_URL, $request->getFullUrl());
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $request->getHeaders());

        if ($request->getMethod() === HttpRequest::METHOD_POST) {
            curl_setopt($this->curl, CURLOPT_POST, true);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($request->getBody()));
        }

        $result = curl_exec($this->curl);

        return new HttpResponse($result ?: '', $this->curl);
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }
}
