<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;

interface VolumeInterface extends MeasurementUnit
{
    public static function getSymbol(): string;

    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toCubicMeterValue(): float;
}
