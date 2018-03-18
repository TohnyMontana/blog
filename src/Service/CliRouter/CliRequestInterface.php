<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

interface CliRequestInterface
{
    public function getName(): string;

    public function get(string $optionName, string $default = null): ?string;
}
