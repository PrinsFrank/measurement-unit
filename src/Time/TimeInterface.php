<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

interface TimeInterface extends MeasurementUnitInterface
{
    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toSecondValue(): float;
}
