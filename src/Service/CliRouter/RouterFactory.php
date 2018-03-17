<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

class RouterFactory
{
    /** @var RouteDto[] */
    private $routes = [];
    /** @var \Closure */
    private $defaultRote;

    public function add(RouteDto $routeDto): void
    {
        $this->routes[] = $routeDto;
    }

    public function setDefaultHandler(\Closure $defaultRote): void
    {
        $this->defaultRote = $defaultRote;
    }

    public function create(): Router
    {
        return new Router($this->defaultRote, $this->routes);
    }

    public function clear(): void
    {
        $this->routes = [];
    }
}