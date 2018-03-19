<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Exception;

class DuplicateCliRouteException extends \DomainException
{
    public function __construct(string $name, string $routeName)
    {
        parent::__construct(
            sprintf(
                'Duplicate route with name: "%s", routeName: "%s"',
                $name,
                $routeName
            )
        );
    }
}
