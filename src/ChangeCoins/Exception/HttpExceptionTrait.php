<?php

declare(strict_types=1);

namespace ChangeCoins\Exception;

use ChangeCoins\Request\ResponseInterface;

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

        $message = $response->getReasonPhrase();
        $code    = $response->getStatusCode();

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
