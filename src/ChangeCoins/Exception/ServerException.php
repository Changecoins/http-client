<?php

declare(strict_types=1);

namespace ChangeCoins\Exception;

class ServerException extends \RuntimeException implements HttpExceptionInterface
{
    use HttpExceptionTrait;
}
