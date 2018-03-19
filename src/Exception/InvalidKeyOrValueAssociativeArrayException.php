<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Exception;

class InvalidKeyOrValueAssociativeArrayException extends \InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct(
            'array type of key must be string, type of value must be string or null'
        );
    }
}
