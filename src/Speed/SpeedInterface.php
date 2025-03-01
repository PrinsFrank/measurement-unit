<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Speed;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;

interface SpeedInterface extends MeasurementUnit
{
    public static function getSymbol(): string;

    public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toMeterPerSecondValue(): float;
}
