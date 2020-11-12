<?php

declare(strict_types=1);

namespace ChangeCoins\Request;

interface RequestInterface
{
    /**
     * @param array $headers
     */
    public function withHeaders(array $headers): void;

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return $this
     */
    public function withHeader(string $name, $value): self;

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasHeader(string $name): bool;

    /**
     * @return array
     */
    public function getHeaders(): array;

    /**
     * @param array $options
     *
     * @return $this
     */
    public function withOptions(array $options): self;

    /**
     * @return array
     */
    public function getOptions(): array;

    /**
     * @param string $url
     */
    public function withUrl(string $url): self;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return string
     */
    public function getFullUrl(): string;

    /**
     * @param string $method
     *
     * @return $this
     */
    public function withMethod(string $method): self;

    /**
     * @return string
     */
    public function getMethod(): string;

    /**
     * @param array $data
     *
     * @return $this
     */
    public function withBody(array $data): self;

    /**
     * @return array
     */
    public function getBody(): array;

    /**
     * @return string
     */
    public function getBodyAsJson(): string;
}
