<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Volume implements VolumeInterface
{
    private ArithmeticOperationsFloatingPoint|ArithmeticOperations $arithmeticOperations;

    public function __construct(protected float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

    public function toCubicInch(): CubicInch
    {
        return $this->toUnit($this->value, CubicInch::class);
    }

    public function toCubicMeter(): CubicMeter
    {
        return $this->toUnit($this->value, CubicMeter::class);
    }

    public function toCubicYard(): CubicYard
    {
        return $this->toUnit($this->value, CubicYard::class);
    }

    public function toFluidDram(): FluidDram
    {
        return $this->toUnit($this->value, FluidDram::class);
    }

    public function toFluidOunce(): FluidOunce
    {
        return $this->toUnit($this->value, FluidOunce::class);
    }

    public function toLiter(): Liter
    {
        return $this->toUnit($this->value, Liter::class);
    }

    public function toPint(): Pint
    {
        return $this->toUnit($this->value, Pint::class);
    }

    public function toQuart(): Quart
    {
        return $this->toUnit($this->value, Quart::class);
    }

    public function toTableSpoon(): TableSpoon
    {
        return $this->toUnit($this->value, TableSpoon::class);
    }

    /**
     * @template T of Weight
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(float $value, string $fqn): Volume
    {
        return new $fqn(
            $fqn::fromCubicMeterValue(
                static::toCubicMeterValue($value, $this->arithmeticOperations),
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
