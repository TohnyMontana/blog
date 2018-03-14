<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

interface CliRequestInterface
{
    function getName(): string;

    function get(string $optionName, string $default = null): ?string;
}
