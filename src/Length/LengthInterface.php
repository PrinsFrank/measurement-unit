<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;

interface LengthInterface extends MeasurementUnit
{
    public static function getSymbol(): string;

    /** @return static */
    public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toMeterValue(): float;
}
