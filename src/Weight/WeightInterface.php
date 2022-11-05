<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;

interface WeightInterface extends MeasurementUnit
{
    public static function getSymbol(): string;

    /** @return static */
    public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): self;

    public function toKilogramValue(): float;
}
