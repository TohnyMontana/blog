<?php

namespace TohnyMontana\blog\Exception;

class ValueNotInArrayException extends ArgumentException
{
    /**
     * @param string $variableName
     * @param mixed  $variableValue
     * @param array  $array
     * @throws InvalidArrayException
     * @throws InvalidStringException
     */
    public function __construct($variableName, $variableValue, $array)
    {
        if (!is_string($variableName)) {
            throw new InvalidStringException('variableName', $variableName);
        } elseif (!is_array($array)) {
            throw new InvalidArrayException('array', $array);
        }
        parent::__construct(
            sprintf(
                'Variable "$%s" must be "in array" {%s}, actual value: "%s"',
                $variableName,
                print_r($array, true),
                print_r($variableValue, true)
            )
        );
    }
}