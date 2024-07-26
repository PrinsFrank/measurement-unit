<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Temperature implements TemperatureInterface
{
    public readonly ArithmeticOperations $arithmeticOperations;

    public function __construct(public readonly float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

    public function toCelsius(): Celsius
    {
        return $this->toUnit(Celsius::class);
    }

    public function toFahrenheit(): Fahrenheit
    {
        return $this->toUnit(Fahrenheit::class);
    }

    public function toRankine(): Rankine
    {
        return $this->toUnit(Rankine::class);
    }

    public function toKelvin(): Kelvin
    {
        return $this->toUnit(Kelvin::class);
    }

    /**
     * @template T of Temperature
     * @param class-string<T> $fqn
     * @return T
     */
    public function toUnit(string $fqn): Temperature
    {
        /** @var T $unit */
        $unit = $fqn::fromKelvinValue($this->toKelvinValue(), $this->arithmeticOperations);

        return $unit;
    }

    public function __toString(): string
    {
        return $this->value . static::getSymbol();
    }
}
