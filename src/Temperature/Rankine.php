<?php
declare(strict_types=1);

class Rankine extends Temperature
{
    public function getSymbol(): string
    {
        return '°Ra';
    }

    public static function toKelvinValue(): float
    {
        // TODO: Implement toKelvinFactor() method.
    }
}
