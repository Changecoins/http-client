<?php

declare(strict_types=1);

namespace ChangeCoins\Request;

use ChangeCoins\Exception\JsonException;

class HttpResponse implements ResponseInterface
{
    use CommonResponseTrait;

    private $statusCode;

    /**
     * @var array|null
     */
    private $jsonDecodedData;

    /**
     * @var string
     */
    private $result;

    /**
     * @var resource
     */
    private $curlResource;

    /**
     * @param string   $result
     * @param resource $curlResource
     */
    public function __construct(string $result, $curlResource)
    {
        $this->result       = $result;
        $this->curlResource = $curlResource;
    }

    /**
     * @inheritDoc
     */
    public function getStatusCode(): int
    {
        if ($this->statusCode === null) {
            $this->statusCode = (int) curl_getinfo($this->curlResource, CURLINFO_RESPONSE_CODE);
        }

        return $this->statusCode;
    }

    /**
     * @inheritDoc
     */
    public function getReasonPhrase(): string
    {
        return curl_error($this->curlResource);
    }

    /**
     * @inheritDoc
     */
    public function getInfo(string $type = null)
    {
        $info = curl_getinfo($this->curlResource);

        return $type !== null ? $info[$type] ?? null : $info;
    }

    /**
     * @inheritDoc
     */
    public function getContent(): string
    {
        $this->checkStatusCode();

        return $this->result;
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        $this->checkStatusCode();

        if ($this->result === '') {
            throw new JsonException('Response body is empty.');
        }

        if ($this->jsonDecodedData !== null) {
            return $this->jsonDecodedData;
        }


        $contentType = $this->headers['content-type'][0] ?? 'application/json';

        if (!preg_match('/\bjson\b/i', $contentType)) {
            throw new JsonException(
                sprintf(
                    'Response content-type is "%s" while a JSON-compatible one was expected".',
                    $contentType
                )
            );
        }

        try {
            $decodedResult = json_decode($this->result, true, 512, JSON_BIGINT_AS_STRING);
        } catch (\RuntimeException $e) {
            throw new JsonException($e->getMessage(), (int) $e->getCode());
        }

        if (!is_array($decodedResult)) {
            throw new JsonException('JSON content was expected to decode to an array.');
        }

        $this->jsonDecodedData = $decodedResult;

        return $decodedResult;
    }
}
