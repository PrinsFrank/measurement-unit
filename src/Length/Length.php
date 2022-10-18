<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;

abstract class Length implements LengthInterface
{
    public function __construct(protected float $value, protected ArithmeticOperations $arithmeticOperations) { }

    public function toFathom(): Fathom
    {
        return $this->toUnit($this->value, Fathom::class);
    }

    public function toFoot(): Foot
    {
        return $this->toUnit($this->value, Foot::class);
    }

    public function toFurlong(): Furlong
    {
        return $this->toUnit($this->value, Furlong::class);
    }

    public function toHorseLength(): HorseLength
    {
        return $this->toUnit($this->value, HorseLength::class);
    }

    public function toInch(): Inch
    {
        return $this->toUnit($this->value, Inch::class);
    }

    public function toMeter(): Meter
    {
        return $this->toUnit($this->value, Meter::class);
    }

    public function toMile(): Mile
    {
        return $this->toUnit($this->value, Mile::class);
    }

    public function toNauticalMile(): NauticalMile
    {
        return $this->toUnit($this->value, NauticalMile::class);
    }

    public function toStatuteMile(): StatuteMile
    {
        return $this->toUnit($this->value, StatuteMile::class);
    }

    public function toThou(): Thou
    {
        return $this->toUnit($this->value, Thou::class);
    }

    public function toYard(): Yard
    {
        return $this->toUnit($this->value, Yard::class);
    }

    /**
     * @template T of Length
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(float $value, string $fqn): Length
    {
        return new $fqn(
            $fqn::fromMeterValue(
                static::toMeterValue($value, $this->arithmeticOperations),
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
