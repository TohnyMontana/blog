<?php

namespace TohnyMontana\blog\Exception;

class InvalidNotStringException extends ArgumentException
{
    /**
     * @param string $variableName
     * @throws InvalidStringException
     */
    public function __construct($variableName)
    {
        if (!is_string($variableName)) {
            throw new InvalidStringException('variableName', $variableName);
        }
        parent::__construct(
            sprintf(
                'Variable "$%s" must be "not string"',
                $variableName
            )
        );
    }
}