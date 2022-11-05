<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

interface WeightInterface
{
    public static function getSymbol(): string;

    public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): static;

    public function toKilogramValue(): float;
}
