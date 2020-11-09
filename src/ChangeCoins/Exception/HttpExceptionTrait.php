<?php

declare(strict_types=1);

namespace ChangeCoins\Exception;

use ChangeCoins\Message\RequestInterface;

trait HttpExceptionTrait
{
    /**
     * @var RequestInterface
     */
    private $response;

    /**
     * @param RequestInterface $response
     */
    public function __construct(RequestInterface $response)
    {
        $this->response = $response;

        $message = $response->getStatusCode();
        $code    = $response->getReasonPhrase();

        parent::__construct($message, $code);
    }

    /**
     * @return RequestInterface
     */
    public function getResponse(): RequestInterface
    {
        return $this->response;
    }
}
