<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

interface LengthInterface extends MeasurementUnitInterface
{
    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toMeterValue(): float;
}
