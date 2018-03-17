<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

use TohnyMontana\blog\Exception;

class RouteDto
{
    /** @var string */
    private $name;
    /** @var string */
    private $routeName;
    /** @var \Closure */
    private $handler;

    public function __construct(
        string $name,
        string $routeName,
        \Closure $handler
    ) {
        if (empty($name)) {
            throw new InvalidNotEmptyException($name);
        } elseif (empty($routeName)) {
            throw new InvalidNotEmptyException($routeName);
        }

        $this->name      = $name;
        $this->routeName = $routeName;
        $this->handler   = $handler;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRouteName(): string
    {
        return $this->routeName;
    }

    public function getHandler(): \Closure
    {
        return $this->handler;
    }
}