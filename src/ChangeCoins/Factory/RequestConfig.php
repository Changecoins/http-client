<?php

declare(strict_types=1);

namespace ChangeCoins\Factory;

final class RequestConfig implements RequestConfigInterface
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
     * @var array
     */
    private $options;

    /**
     * @param string $publicKey
     * @param string $secretKey
     * @param array  $options
     */
    public function __construct(string $publicKey, string $secretKey, array $options = [])
    {
        $this->publicKey = $publicKey;
        $this->secretKey = $secretKey;
        $this->options   = $options;
    }

    /**
     * @return string
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
