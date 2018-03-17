<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

class Input implements CliRequestInterface
{
    /** @var string */
    private $name;
    /** @var string[] */
    private $options = [];

    public function __construct(string $name, string $options)
    {
        $options = $this->optionsValidation($options);

        $this->name      = $name;
        $this->options[] = $options;
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

    private function optionsValidation(string $arr): array
    {
        $arr    = array_filter(array_keys($arr), 'is_string');
        $newArr = [];

        foreach ($arr as $item) {
            if (is_string($item) || (is_null($item))) {
                $newArr[] = $item;
            }
        }

        return $newArr;
    }
}
