<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

interface HandlerInterface
{
    function handle(InputInterface $input, OutputInterface $output): void;
}
