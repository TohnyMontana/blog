<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

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
            $addMethod    = $routeDto->getMethod();


            foreach ($this->routes as $route) {
                $name      = $route->getName();
                $routeName = $route->getRouteName();
                $method    = $route->getMethod();

                if (($addName === $name) || ($addRouteName === $routeName) && ($addMethod === $method)) {
                    throw new \Exception();
                }
            }
        }

        $this->routes[] = $routes;
    }

    public function resolve(ServerRequestInterface $request): RequestHandlerInterface
    {
        $method = $request->getMethod();

        foreach ($this->routes as $route) {
            if ($route->getMethod() === $method) {
                return $route->getHandler();
            }
        }

        return $this->defaultHandler;
    }
}