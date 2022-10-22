<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Speed;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Speed implements SpeedInterface
{
    private ArithmeticOperations $arithmeticOperations;

    public function __construct(protected float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

    public function toKilometerPerHour(): KilometerPerHour
    {
        return $this->toUnit($this->value, KilometerPerHour::class);
    }

    public function toMeterPerSecond(): MeterPerSecond
    {
        return $this->toUnit($this->value, MeterPerSecond::class);
    }

    public function toMilesPerHour(): MilesPerHour
    {
        return $this->toUnit($this->value, MilesPerHour::class);
    }

    /**
     * @template T of Speed
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(float $value, string $fqn): Speed
    {
        return new $fqn(
            $fqn::fromMeterPerSecondValue(
                static::toMeterPerSecondValue($value, $this->arithmeticOperations),
                $this->arithmeticOperations
            ),
            $this->arithmeticOperations
        );
    }

    public function __toString(): string
    {
        return $this->value . static::getSymbol();
    }
}
