<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

interface TemperatureInterface extends MeasurementUnitInterface
{
    public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toKelvinValue(): float;
}
