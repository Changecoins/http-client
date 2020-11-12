<?php

declare(strict_types=1);

namespace ChangeCoins\Exception;

final class ClientException extends \RuntimeException implements ClientExceptionInterface
{
    use HttpExceptionTrait;
}
