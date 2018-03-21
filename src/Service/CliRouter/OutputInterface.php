<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

interface OutputInterface
{
    public function write(): void;

    public function writeLn(): void;

    public function printf(string $message, ...$arguments): void;
}
