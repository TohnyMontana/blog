<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\HttpRouter;

class RouterFactory
{
    /** @var RouteDto[] */
    private $routes = [];
    /** @var \Closure */
    private $defaultRote;

    public function get(string $name, string $path, \Closure $handler): self
    {
        $this->routes[] = new RouteDto($name, $path, RouteDto::GET, $handler);

        return $this;
    }

    public function post(string $name, string $path, \Closure $handler): self
    {
        $this->routes[] = new RouteDto($name, $path, RouteDto::POST, $handler);

        return $this;
    }

    public function put(string $name, string $path, \Closure $handler): self
    {
        $this->routes[] = new RouteDto($name, $path, RouteDto::PUT, $handler);

        return $this;
    }

    public function delete(string $name, string $path, \Closure $handler): self
    {
        $this->routes[] = new RouteDto($name, $path, RouteDto::DELETE, $handler);

        return $this;
    }

    public function head(string $name, string $path, \Closure $handler): self
    {
        $this->routes[] = new RouteDto($name, $path, RouteDto::HEAD, $handler);

        return $this;
    }

    public function options(string $name, string $path, \Closure $handler): self
    {
        $this->routes[] = new RouteDto($name, $path, RouteDto::OPTIONS, $handler);

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
