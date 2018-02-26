<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\HttpRouter;

use http\Exception\InvalidArgumentException;

class RouteDto
{
    /** @var string */
    private $name;
    /** @var string */
    private $path;
    /** @var string */
    private $method;
    /** @var Callable */
    private $handler;

    /** @var string */
    public const GET = "GET";
    /** @var string */
    public const POST = "POST";
    /** @var string */
    public const PUT = "PUT";
    /** @var string */
    public const DELETE = "DELETE";
    /** @var string */
    public const HEAD = "HEAD";
    /** @var string */
    public const OPTIONS = "OPTIONS";

    public function __construct(
        string $name,
        string $path,
        string $method,
        Callable $handler
    ) {
        if (strlen($name) !== 0) {
            $this->name = $name;
        } else {
            throw new InvalidArgumentException('аргумет конструктора $name, класса RouteDto,
             должен быть не пустой строкой'
            );
        }

        if (strlen($path) !== 0) {
            $this->path = $path;
        } else {
            throw new InvalidArgumentException('аргумет конструктора $path, класса RouteDto,
             должен быть не пустой строкой'
            );
        }

        if (strlen($method) !== 0 && $method === self::GET ||
            $method === self::POST ||
            $method === self::PUT ||
            $method === self::HEAD ||
            $method === self::OPTIONS ||
            $method === self::DELETE) {
            $this->method = $method;
        } else {
            throw new InvalidArgumentException('аргумет конструктора $method, класса RouteDto,
             должен быть HTTP метод: GET/POST/PUT... строкового типа'
            );
        }

        if (!empty($handler) && is_callable($handler)) {
            $this->handler = $handler;
        } else {
            throw new InvalidArgumentException('аргумет конструктора $handler, класса RouteDto,
             должен быть не пустой объект типа \Callable'
            );
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

    public function getHandler(): Callable
    {
        return $this->handler;
    }
}
