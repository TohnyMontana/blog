<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\HttpRouter;

class Router
{
    /** @var RouteDto[] */
    private $routes = [];
    /** @var \Closure */
    private $defaultHandler;

    public function __construct(\Closure $defaultHandler, RouteDto ...$routes)
    {
        $this->defaultHandler = $defaultHandler;

        foreach ($routes as $RouteDto) {

            foreach ($this->routes as $route) {

                if ($RouteDto->getName() === $route->getName()) {
                    throw new DuplicateRouteException("this name is already in use");
                } elseif ($RouteDto->getPath() === $route->getPath()
                    && $RouteDto->getMethod() === $route->getMethod()) {
                    throw new DuplicateRouteException("this path and Method is already in use");
                }
            }

            $this->routes[] = $RouteDto;
        }
    }

    public function resolve(ServerRequestInterface $request): RequestHandlerInterface
    {
        $method = $request->getMethod();
        $uri    = $request->getUri();
        $path   = $uri->getPath();

        foreach ($this->routes as $route) {
            if ($route->getMethod() === $method && $route->getPath() === $path) {
                return $route->getHandler();
            }
        }

        return $this->defaultHandler;
    }
}
