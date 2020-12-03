<?php

declare(strict_types=1);

namespace ChangeCoins\Transport;

use ChangeCoins\Exception\ConfigurationException;
use ChangeCoins\Factory\RequestConfigInterface;
use ChangeCoins\Request\HttpResponse;
use ChangeCoins\Request\RequestInterface;
use ChangeCoins\Request\ResponseInterface;

class CurlTransport implements TransportInterface
{
    /**
     * @var RequestConfigInterface
     */
    private $requestConfig;

    /**
     * @var resource
     */
    private $curl;

    /**
     * @param RequestConfigInterface $requestConfig
     */
    public function __construct(RequestConfigInterface $requestConfig)
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
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $request->getMethod());
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($request->getBody()));


        $result = curl_exec($this->curl);

        return new HttpResponse((is_string($result)) ? $result : '', $this->curl);
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }
}
