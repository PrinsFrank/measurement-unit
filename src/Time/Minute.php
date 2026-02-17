<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Minute extends Time
{
    protected static string $defaultSymbol = 'min';

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->divide($value, 60), $arithmeticOperations);
    }

    public function toSecondValue(): float
    {
        return $this->arithmeticOperations->multiply($this->value, 60);
    }
}
