<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Exception;

class InvalidStringException extends \InvalidArgumentException
{
    public function __construct(string $variableName, $variableValue)
    {
        if (is_string($variableValue)) {
            throw new InvalidNotStringException('variableValue');
        }
        parent::__construct(
            sprintf(
                'Variable "$%s" must be "string", actual type: "%s"',
                $variableName,
                gettype($variableValue)
            )
        );
    }
}
