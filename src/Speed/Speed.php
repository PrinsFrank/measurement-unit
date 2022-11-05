<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Speed;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Speed implements SpeedInterface
{
    protected ArithmeticOperations $arithmeticOperations;

    public function __construct(protected float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

    public function toKilometerPerHour(): KilometerPerHour
    {
        return $this->toUnit(KilometerPerHour::class);
    }

    public function toMeterPerSecond(): MeterPerSecond
    {
        return $this->toUnit(MeterPerSecond::class);
    }

    public function toMilesPerHour(): MilesPerHour
    {
        return $this->toUnit(MilesPerHour::class);
    }

    /**
     * @template T of Speed
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(string $fqn): Speed
    {
        return $fqn::fromMeterPerSecondValue($this->toMeterPerSecondValue(), $this->arithmeticOperations);
    }

    public function __toString(): string
    {
        return $this->value . static::getSymbol();
    }
}
