<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Volume;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Volume implements VolumeInterface
{
    protected ArithmeticOperations $arithmeticOperations;

    public function __construct(protected float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

    public function toCubicInch(): CubicInch
    {
        return $this->toUnit(CubicInch::class);
    }

    public function toCubicMeter(): CubicMeter
    {
        return $this->toUnit(CubicMeter::class);
    }

    public function toCubicYard(): CubicYard
    {
        return $this->toUnit(CubicYard::class);
    }

    public function toFluidDram(): FluidDram
    {
        return $this->toUnit(FluidDram::class);
    }

    public function toFluidOunce(): FluidOunce
    {
        return $this->toUnit(FluidOunce::class);
    }

    public function toLiter(): Liter
    {
        return $this->toUnit(Liter::class);
    }

    public function toPint(): Pint
    {
        return $this->toUnit(Pint::class);
    }

    public function toQuart(): Quart
    {
        return $this->toUnit(Quart::class);
    }

    public function toTableSpoon(): TableSpoon
    {
        return $this->toUnit(TableSpoon::class);
    }

    /**
     * @template T of VolumeInterface
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(string $fqn): Volume
    {
        return $fqn::fromCubicMeterValue($this->toCubicMeterValue(), $this->arithmeticOperations);
    }

    public function __toString(): string
    {
        return $this->value . static::getSymbol();
    }
}
