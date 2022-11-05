<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class CentiTick extends Time
{
    public static function getSymbol(): string
    {
        return 'ct';
    }

    public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): static
    {
        return new static($arithmeticOperations->multiply($value, 0.864), $arithmeticOperations);
    }

    public function toSecondValue(): float
    {
        return $this->arithmeticOperations->divide($this->value, 0.864);
    }
}
