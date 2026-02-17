<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Angle;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Radian extends Angle
{
    protected static string $defaultSymbol = 'rad';

    public static function fromRadianValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self($value, $arithmeticOperations);
    }

    public function toRadianValue(): float
    {
        return $this->value;
    }

  }
