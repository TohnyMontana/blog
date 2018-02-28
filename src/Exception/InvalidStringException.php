<?php

namespace TohnyMontana\blog\Exception;

class InvalidStringException extends ArgumentException
{
    /**
     * @param string                             $variableName
     * @param array|bool|float|int|null|resource $variableValue
     * @throws InvalidNotStringException
     * @throws InvalidStringException
     */
    public function __construct($variableName, $variableValue)
    {
        if (!is_string($variableName)) {
            throw new InvalidStringException('variableName', $variableName);
        } elseif (is_string($variableValue)) {
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