<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Tick extends Time
{
    public static function getSymbol(): string
    {
        return 't';
    }

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($arithmeticOperations->multiply($value, 0.000864), $arithmeticOperations);
    }

    public function toSecondValue(): float
    {
        return $this->arithmeticOperations->divide($this->value, 0.000864);
    }
}
