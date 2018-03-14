<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

class Parser
{
    function parse(string ...$arg): CliRequestInterface
    {
        $input = new Input($arg[0], ...$arg);

        return (CliRequestInterface) ($input);
    }
}

