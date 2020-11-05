<?php

declare(strict_types=1);

namespace ChangeCoins\Exception;

use ChangeCoins\Message\ResponseInterface;

trait HttpExceptionTrait
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;

        $message = $response->getStatusCode();
        $code    = $response->getReasonPhrase();

        parent::__construct($message, $code);
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
