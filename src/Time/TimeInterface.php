<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

interface TimeInterface
{
    public static function getSymbol(): string;

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): static;

    public function toSecondValue(): float;
}
