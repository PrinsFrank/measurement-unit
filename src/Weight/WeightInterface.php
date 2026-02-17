<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

interface WeightInterface extends MeasurementUnitInterface
{
    public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toKilogramValue(): float;
}
