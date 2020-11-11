<?php

declare(strict_types=1);

namespace ChangeCoins\Request;

use ChangeCoins\Enum\Api;

class HttpRequest extends Request
{
    /**
     * @var array
     */
    private $headers = [
        'Accept' => 'Application/json',
    ];

    /**
     * @var array
     */
    private $options = [
        CURLOPT_USERAGENT      => 'ChangeCoins-PHP-SDK',
        CURLOPT_HEADER         => false,
        CURLINFO_HEADER_OUT    => true,
        CURLOPT_RETURNTRANSFER => true,
    ];

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $method = Request::METHOD_POST;

    /**
     * @var array
     */
    private $bodyData = [];

    /**
     * @inheritDoc
     */
    public function withHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @inheritDoc
     */
    public function withHeader(string $name, $value): RequestInterface
    {
        $this->headers[$name] = $value;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function hasHeader(string $name): bool
    {
        return array_key_exists($name, $this->headers);
    }

    /**
     * @inheritDoc
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @inheritDoc
     */
    public function withOptions(array $options): RequestInterface
    {
        $this->options = array_merge($this->options, $options);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @inheritDoc
     */
    public function withUrl(string $url): RequestInterface
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFullUrl(): string
    {
        return sprintf('%s/%s/%s', $this->getBaseUrl(), Api::API_DEFAULT_VERSION, $this->getUrl());
    }

    /**
     * @inheritDoc
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @inheritDoc
     */
    public function withMethod(string $method): RequestInterface
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @inheritDoc
     */
    public function withBody(array $data): RequestInterface
    {
        $this->bodyData = $data;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getBody(): array
    {
        return $this->bodyData;
    }

    /**
     * @return string
     */
    public function getBodyAsJson(): string
    {
        return json_encode($this->getBody());
    }
}
