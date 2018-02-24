<?php

namespace Router;

class Router
{
    private $routes = array();
    private $defaultHandler ;
   
    public function __construct($defaultHandler, array $RouteDtoArr)
    {
        $this->defaultHandler = $defaultHandler;

        foreach ($RouteDtoArr as $RouteDto)
        {
            $uniqueName = true;

            foreach ($this->routes as $route)
            {
                if($RouteDto->getName() === $route->getName()){
                    $uniqueName = false;
                    break;
                }
            }

            if ($uniqueName) {
                $this->routes += $RouteDto;
            }
        }
    }

    public function resolve(ServerRequestInterface $request): RequestHandlerInterface
    {

    }
}
