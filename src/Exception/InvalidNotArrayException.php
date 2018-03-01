<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Exception;

class InvalidNotArrayException extends ArgumentException
{
    public function __construct(string $variableName)
    {
        parent::__construct(
            sprintf(
                'Variable "$%s" must be "not array"',
                $variableName
            )
        );
    }
}