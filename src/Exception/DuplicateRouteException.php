<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Exception;

class DuplicateRouteException extends \DomainException
{
    public function __construct(string $name, string $path, string $method)
    {
        parent::__construct(
            sprintf(
                'Duplicate route with name: "%s", path: "%s", method: "%s"',
                $name,
                $path,
                $method
            )
        );
    }
}
