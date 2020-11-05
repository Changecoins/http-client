<?php

declare(strict_types=1);

namespace ChangeCoins\Exception;

/**
 * Thrown by responses' toArray() method when their content cannot be JSON-decoded.
 */
class JsonException extends \RuntimeException implements DecodingExceptionInterface
{
}

