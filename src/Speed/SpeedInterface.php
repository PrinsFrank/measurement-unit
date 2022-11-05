<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Speed;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

interface SpeedInterface
{
    public static function getSymbol(): string;

    /** @return static */
    public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toMeterPerSecondValue(): float;
}
