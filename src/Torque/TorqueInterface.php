<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Torque;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

interface TorqueInterface extends MeasurementUnitInterface
{
    public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toNewtonMeterValue(): float;
}
