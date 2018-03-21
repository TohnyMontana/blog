<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\HttpRouter;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use TohnyMontana\blog\Exception\DuplicateRouteException;

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
            $addName   = $routeDto->getName();
            $addPath   = $routeDto->getPath();
            $addMethod = $routeDto->getMethod();

            foreach ($this->routes as $route) {
                $name   = $route->getName();
                $path   = $route->getPath();
                $method = $route->getMethod();

                if (($addName === $name) || (($addPath === $path) && ($addMethod === $method))) {
                    throw new DuplicateRouteException($addName, $addPath, $addMethod);
                }
            }

            $this->routes[] = $routeDto;
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
