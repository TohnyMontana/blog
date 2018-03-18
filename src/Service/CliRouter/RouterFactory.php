<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

class RouterFactory
{
    /** @var RouteDto[] */
    private $routes = [];
    /** @var \Closure */
    private $defaultRote;

    public function addRoute(string $name, string $routeName, \Closure $handler): void
    {
        $this->routes[] = new RouteDto($name, $routeName, $handler);
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
