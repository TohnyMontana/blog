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
                if (
                    ($RouteDto->getName() === $route->getName()) ||
                    ($RouteDto->getPath() === $route->getPath()) &&
                    ($RouteDto->getMethod() === $route->getMethod())
                ) {
                    throw new DuplicateRouteException(
                        $RouteDto->getName(),
                        $RouteDto->getPath(),
                        $RouteDto->getMethod()
                    );
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
