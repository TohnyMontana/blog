<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Exception;

class InvalidArrayException extends ArgumentException
{
    public function __construct(string $variableName, $variableValue)
    {
        if (is_array($variableValue)) {
            throw new InvalidNotArrayException('variableValue');
        }
        parent::__construct(
            sprintf(
                'Variable "$%s" must be "array", actual type: "%s"',
                $variableName,
                gettype($variableValue)
            )
        );
    }
}