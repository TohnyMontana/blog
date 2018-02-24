<?php

namespace Router;

class RouterFactory
{
    private $routes = array();

    public function get($name, $path, $handler): self
    {
        $this->routes += new HttpRouteDto($name, $path,"GET", $handler);
        // не понимаю, возвращать просто новый обьект класса RouterFactory ?
    }

    public function post($name, $path, $handler): self
    {
        $this->routes += new HttpRouteDto($name, $path,"POST", $handler);
    }

    public function put($name, $path, $handler): self
    {
        $this->routes += new HttpRouteDto($name, $path,"PUT", $handler);
    }

    public function delete($name, $path, $handler): self
    {
        $this->routes += new HttpRouteDto($name, $path,"DELETE", $handler);
    }

    //  не знаю какие свойства  должены быть у роута по умолчанию а именно (имя, путь, метод, хендлер)
    // и сохранять его вместе со всеми роутами или отдельное поле $defaultRote
    public function setDefaultRoute()
    {

    }

    public function create()
    {
        // не знаю какой хендлер должен идти в конструктор первым аргументом
        $router = new Router("", $this->routes);
    }

    public function clear()
    {
        $this->routes = array();
    }
}
