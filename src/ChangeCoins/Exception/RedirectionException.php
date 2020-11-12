<?php

declare(strict_types=1);

namespace ChangeCoins\Exception;

class RedirectionException extends \RuntimeException implements HttpExceptionInterface
{
    use HttpExceptionTrait;
}
