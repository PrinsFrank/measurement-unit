<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

interface VolumeInterface
{
    public static function getSymbol(): string;

    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): static;

    public function toCubicMeterValue(): float;
}
