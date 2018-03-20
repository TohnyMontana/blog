<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

use TohnyMontana\blog\Exception\InvalidStringException;
use TohnyMontana\blog\Exception\InvalidStringOrNullException;

class Input implements CliRequestInterface
{
    /** @var string */
    private $name;
    /** @var string[] */
    private $options = [];

    public function __construct(string $name, array $options)
    {
        foreach ($options as $key => $value) {
            if (!is_string($key)) {
                throw new InvalidStringException('key', $key);
            } elseif (!(is_string($value) || is_null($value))) {
                throw new InvalidStringOrNullException('value', $value);
            }
        }

        foreach ($options as $key => $value) {
            $this->$options[$key] = $value;
        }

        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function get(string $optionName, string $default = null): ?string
    {
        if (array_key_exists($optionName, $this->options)) {
            return $this->options[$optionName];
        }

        return $default;
    }
}
