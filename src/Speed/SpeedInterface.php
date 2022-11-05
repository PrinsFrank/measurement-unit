<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Speed;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

interface SpeedInterface
{
    public static function getSymbol(): string;

    public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): static;

    public function toMeterPerSecondValue(): float;
}
