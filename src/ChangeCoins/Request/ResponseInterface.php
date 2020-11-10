<?php

declare(strict_types=1);

namespace ChangeCoins\Request;

interface ResponseInterface
{
    /**
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * @return string
     */
    public function getReasonPhrase(): string;

    /**
     * @param string $type
     *
     * @return array|mixed|null
     */
    public function getInfo(string $type = null);

    /**
     * @return string
     */
    public function getContent(): string;

    /**
     * @return array
     */
    public function toArray(): array;
}
