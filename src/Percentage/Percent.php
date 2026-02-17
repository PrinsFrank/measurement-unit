<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Percentage;

class Percent extends Percentage
{
    protected static string $defaultSymbol = '%';

    /**
     * Returns the percentage as a decimal ratio.
     * Example: 75% => 0.75 (unitless)
     */
    public function toDecimal(): float
    {
      return $this->toDecimalValue();
    }

    /**
     * Returns a multiplicative coefficient.
     * Example: 15% => 1.15 (unitless)
     * Can be useful when representing increase/decrease
     */
    public function toCoefficient(): float
    {
        return 1 + $this->toDecimalValue();
    }


    // Percentage to Decimal DRY method
    private function toDecimalValue(): float
    {
        return $this->arithmeticOperations->divide($this->value, 100);
    }

  }
