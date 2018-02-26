<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\HttpRouter;

class RouteDto
{
    public const GET     = "GET";
    public const POST    = "POST";
    public const PUT     = "PUT";
    public const DELETE  = "DELETE";
    public const HEAD    = "HEAD";
    public const OPTIONS = "OPTIONS";

    /** @var string */
    private $name;
    /** @var string */
    private $path;
    /** @var string */
    private $method;
    /** @var \Closure */
    private $handler;
    /** @var string[] */
    private $methodsArr = [
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
            throw new ArgumentException('Argument "$name" must be not empty');
        } elseif (empty($path)) {
            throw new ArgumentException('Argument "$path" must be not empty');
        } elseif (in_array($method, $this->methodsArr, true)) {
            throw new ArgumentException('Argument "$method" must be HTTP method:
             GET/POST/PUT...'
            );
        } elseif (empty($handler)) {
            throw new ArgumentException('Argument "$handler" must be not empty'
            );
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
