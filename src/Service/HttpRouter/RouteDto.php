<?php

namespace Router;

class RouteDto
{
    private $name;
    private $path;
    private $method;
    private $handler;

    public function __construct(string $name, string $path,
                                string $method, $handler)
    {
        if (strlen($name) !== 0) {
            $this->name = $name;
        }

        if (strlen($path) !== 0) {
            $this->path = $path;
        }

        if (strlen($method) !== 0 && $method === "GET"  ||
                                     $method === "POST" ||
                                     $method === "PUT"  ||
                                     $method === "DELETE")
        {
            $this->method = $method;
        }

        if (!empty($handler) && is_callable($handler)) {

            $this->handler = $handler;
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getHandler()
    {
        return $this->handler;
    }
}
