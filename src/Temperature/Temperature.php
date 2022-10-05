<?php
declare(strict_types=1);

abstract class Temperature implements MeasurementUnit
{
    protected float $value;

    abstract public function getSymbol(): string;

    abstract public static function toKelvinValue(float $value): float;

    final public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value . $this->getSymbol();
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

    /**
     * @template T of Temperature
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(float $value, string $fqn): Temperature
    {
        return new $fqn($value * static::toKelvinValue() / $fqn::toKelvinValue());
    }
}
