<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

interface HandlerInterface
{
    public function handle(CliRequestInterface $cliRequest, OutputInterface $output): void;
}
