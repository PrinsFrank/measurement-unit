<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Pressure;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;

interface PressureInterface extends MeasurementUnit
{
    public static function getSymbol(): string;

    public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toPascalValue(): float;
}
