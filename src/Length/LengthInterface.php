<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;

interface LengthInterface extends MeasurementUnit
{
    public static function getSymbol(): string;

    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): static;

    public function toMeterValue(): float;
}
