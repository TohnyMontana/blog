<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

interface OutputInterface
{
    function write(): void;

    function writeLn(): void;

    function printf(string $message, ...$arguments): void;
}