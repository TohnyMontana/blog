<?php

namespace TohnyMontana\blog\Exception;

class DuplicateRouteException extends \DomainException
{
    /**
     * @param string   $name
     * @param string   $path
     * @param \Closure $method
     * @throws InvalidStringException
     * @throws InvalidNotEmptyException
     */
    public function __construct($name, $path, $method)
    {
        if (!is_string($name)) {
            throw new InvalidStringException('name', $name);
        } elseif (!is_string($path)) {
            throw new InvalidStringException('path', $path);
        } elseif (empty($method)) {
            throw new InvalidNotEmptyException($method);
        }
        parent::__construct(
            sprintf(
                'Variable "%s" must be "unique",
                 variables "%s" and "%s" must be "unique"',
                $name,
                $path,
                $method
            )
        );
    }
}