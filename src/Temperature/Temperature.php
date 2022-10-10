<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Temperature;

abstract class Temperature implements TemperatureInterface
{
    protected float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

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

    public function toReaumur(): Reaumur
    {
        return $this->toUnit($this->value, Reaumur::class);
    }

    /**
     * @template T of Temperature
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(float $value, string $fqn): Temperature
    {
        return new $fqn($fqn::fromKelvinValue(static::toKelvinValue($value)));
    }

    public function __toString(): string
    {
        return $this->value . static::getSymbol();
    }
}
