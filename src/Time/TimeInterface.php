<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;

interface TimeInterface extends MeasurementUnit
{
    public static function getSymbol(): string;

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toSecondValue(): float;
}
