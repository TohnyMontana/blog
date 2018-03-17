<?php
declare(strict_types=1);

namespace TohnyMontana\blog\Service\CliRouter;

class Parser
{
    public function parseArgs(string ...$argv): CliRequestInterface
    {
        $name    = array_shift($argv);
        $options = [];

        foreach ($argv as $arg) {
            // --foo --bar=baz
            if (substr($arg, 0, 2) == '--') {
                $eqPos = strpos($arg, '=');
                // --foo
                if ($eqPos === false) {
                    $key           = substr($arg, 2);
                    $value         = isset($options[$key]) ? $options[$key] : true;
                    $options[$key] = $value;
                } // --bar=baz
                else {
                    $key           = substr($arg, 2, $eqPos - 2);
                    $value         = substr($arg, $eqPos + 1);
                    $options[$key] = $value;
                }
            } // -k=value -abc
            else if (substr($arg, 0, 1) == '-') {
                // -k=value
                if (substr($arg, 2, 1) == '=') {
                    $key           = substr($arg, 1, 1);
                    $value         = substr($arg, 3);
                    $options[$key] = $value;
                } // -abc
                else {
                    $chars = str_split(substr($arg, 1));

                    foreach ($chars as $char) {
                        $key           = $char;
                        $value         = isset($options[$key]) ? $options[$key] : true;
                        $options[$key] = $value;
                    }
                }
            } // plain-arg
            else {
                $value     = $arg;
                $options[] = $value;
            }
        }

        return new Input($name, ...$options);
    }
}
