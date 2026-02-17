<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Speed;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

interface SpeedInterface extends MeasurementUnitInterface
{
    public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toMeterPerSecondValue(): float;
}
