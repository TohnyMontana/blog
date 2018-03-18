<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

use TohnyMontana\blog\Exception\DuplicateCliRouteException;

class Router
{
    /** @var RouteDto[] */
    private $routes = [];
    /** @var \Closure */
    private $defaultHandler;

    public function __construct(\Closure $defaultHandler, RouteDto ...$routes)
    {
        $this->defaultHandler = $defaultHandler;

        foreach ($routes as $routeDto) {
            $addName      = $routeDto->getName();
            $addRouteName = $routeDto->getRouteName();

            foreach ($this->routes as $route) {
                $name      = $route->getName();
                $routeName = $route->getRouteName();

                if (($addName === $name) && ($addRouteName === $routeName)) {
                    throw new DuplicateCliRouteException($addName, $addRouteName);
                }
            }
        }

        $this->routes[] = $routes;
    }

    public function resolve(CliRequestInterface $request): \Closure
    {
        $addName = $request->getName();

        foreach ($this->routes as $routeDto) {
            $name = $routeDto->getName();

            if ($addName === $name) {
                return $routeDto->getHandler();
            }
        }

        return $this->defaultHandler;
    }
}
