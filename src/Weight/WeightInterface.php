<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Weight;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

interface WeightInterface
{
    public static function getSymbol(): string;

    public static function toKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): float;

    public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): float;
}
