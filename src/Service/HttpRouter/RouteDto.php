<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\HttpRouter;

class RouteDto
{
    public const GET     = 'GET';
    public const POST    = 'POST';
    public const PUT     = 'PUT';
    public const DELETE  = 'DELETE';
    public const HEAD    = 'HEAD';
    public const OPTIONS = 'OPTIONS';

    /** @var string */
    private $name;
    /** @var string */
    private $path;
    /** @var string */
    private $method;
    /** @var \Closure */
    private $handler;
    /** @var string[] */
    public const ALLOWED_METHODS = [
        self::GET,
        self::POST,
        self::PUT,
        self::HEAD,
        self::OPTIONS,
        self::DELETE
    ];

    public function __construct(
        string $name,
        string $path,
        string $method,
        \Closure $handler
    ) {
        if (empty($name)) {
            throw new InvalidNotEmptyException($name);
        } elseif (empty($path)) {
            throw new InvalidNotEmptyException($path);
        } elseif (in_array($method, $this->methodsArr, true)) {
            throw new ValueNotInArrayException('method', $method, $this->methodsArr);
        } elseif (empty($handler)) {
            throw new InvalidNotEmptyException($handler);
        }

        $this->name    = $name;
        $this->path    = $path;
        $this->method  = $method;
        $this->handler = $handler;
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

    public function getHandler(): \Closure
    {
        return $this->handler;
    }
}
