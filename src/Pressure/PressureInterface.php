<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Pressure;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

interface PressureInterface extends MeasurementUnitInterface
{
    public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toPascalValue(): float;
}
