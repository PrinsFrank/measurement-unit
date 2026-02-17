<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Angle;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

interface AngleInterface extends MeasurementUnitInterface
{
    public static function fromRadianValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toRadianValue(): float;
}
