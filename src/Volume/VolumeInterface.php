<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

interface VolumeInterface extends MeasurementUnitInterface
{
    public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toCubicMeterValue(): float;
}
