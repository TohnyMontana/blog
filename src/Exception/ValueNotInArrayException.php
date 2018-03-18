<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Exception;

class ValueNotInArrayException extends \InvalidArgumentException
{
    public function __construct(string $variableName, $variableValue, array $array)
    {
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
