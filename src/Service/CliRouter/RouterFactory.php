<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

class RouterFactory
{
    /** @var RouteDto[] */
    private $routes = [];
    /** @var \Closure */
    private $defaultRote;

    public function get(string $name, string $routeName, \Closure $handler): self
    {
        $this->routes = new RouteDto($name, $routeName, RouteDto::GET, $handler);

        return $this;
    }

    public function post(string $name, string $routeName, \Closure $handler): self
    {
        $this->routes = new RouteDto($name, $routeName, RouteDto::POST, $handler);

        return $this;
    }

    public function put(string $name, string $routeName, \Closure $handler): self
    {
        $this->routes = new RouteDto($name, $routeName, RouteDto::PUT, $handler);

        return $this;
    }

    public function delete(string $name, string $routeName, \Closure $handler): self
    {
        $this->routes = new RouteDto($name, $routeName, RouteDto::DELETE, $handler);

        return $this;
    }

    public function head(string $name, string $routeName, \Closure $handler): self
    {
        $this->routes = new RouteDto($name, $routeName, RouteDto::HEAD, $handler);

        return $this;
    }

    public function options(string $name, string $routeName, \Closure $handler): self
    {
        $this->routes = new RouteDto($name, $routeName, RouteDto::OPTIONS, $handler);

        return $this;
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