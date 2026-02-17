<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Angle;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

class Degree extends Angle
{
    protected static string $defaultSymbol = '°';

    public static function fromRadianValue(float $value, ArithmeticOperations $arithmeticOperations): self
    {
        return new self(rad2deg($value), $arithmeticOperations);
    }

    public function toRadianValue(): float
    {
        return deg2rad($this->value);
    }

  }
