<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Exception;

class InvalidStringOrNullException extends \InvalidArgumentException
{
    public function __construct(string $variableName, $variableValue)
    {
        if (is_string($variableValue)) {
            throw new InvalidNotStringException($variableName);
        } elseif (is_null($variableValue)) {
            throw new InvalidNotNullException($variableName);
        }

        parent::__construct(
            sprintf(
                'Variable "$%s" must be "string or null", actual type: "%s"',
                $variableName,
                gettype($variableValue)
            )
        );
    }
}
