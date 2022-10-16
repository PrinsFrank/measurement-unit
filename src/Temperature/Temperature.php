<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

abstract class Temperature implements TemperatureInterface
{
    public function __construct(protected float $value, protected ArithmeticOperations $arithmeticOperations) { }

    public function toCelsius(): Celsius
    {
        return $this->toUnit($this->value, Celsius::class);
    }

    public function toFahrenheit(): Fahrenheit
    {
        return $this->toUnit($this->value, Fahrenheit::class);
    }

    public function toRankine(): Rankine
    {
        return $this->toUnit($this->value, Rankine::class);
    }

    public function toKelvin(): Kelvin
    {
        return $this->toUnit($this->value, Kelvin::class);
    }

    /**
     * @template T of Temperature
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(float $value, string $fqn): Temperature
    {
        return new $fqn(
            $fqn::fromKelvinValue(
                static::toKelvinValue($value, $this->arithmeticOperations),
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
