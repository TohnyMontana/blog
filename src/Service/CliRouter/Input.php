<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

class Input implements CliRequestInterface
{
    /** @var string */
    private $name;
    /** @var string[] */
    private $options = [];

    public function __construct(string $name, string ...$options)
    {
        $this->name    = $name;
        $this->options = $options;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function get(string $optionName, string $default = null): ?string
    {
        foreach ($this->options as $option) {
            if ($optionName === $option) {
                return $option;
            }
        }

        return $default;
    }
}
