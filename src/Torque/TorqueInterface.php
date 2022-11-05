<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Torque;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;

interface TorqueInterface extends MeasurementUnit
{
    public static function getSymbol(): string;

    /** @return static */
    public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toNewtonMeterValue(): float;
}
