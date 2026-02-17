<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\MeasurementUnit\MeasurementUnit;

abstract class Length extends MeasurementUnit implements LengthInterface
{
    public function toCentimeter(): Centimeter
    {
        return $this->toUnit(Centimeter::class);
    }

    public function toFathom(): Fathom
    {
        return $this->toUnit(Fathom::class);
    }

    public function toFoot(): Foot
    {
        return $this->toUnit(Foot::class);
    }

    public function toFurlong(): Furlong
    {
        return $this->toUnit(Furlong::class);
    }

    public function toHorseLength(): HorseLength
    {
        return $this->toUnit(HorseLength::class);
    }

    public function toInch(): Inch
    {
        return $this->toUnit(Inch::class);
    }

    public function toKilometer(): Kilometer
    {
        return $this->toUnit(Kilometer::class);
    }

    public function toMeter(): Meter
    {
        return $this->toUnit(Meter::class);
    }

    public function toMillimeter(): Millimeter
    {
        return $this->toUnit(Millimeter::class);
    }

    public function toStatuteMile(): StatuteMile
    {
        return $this->toUnit(StatuteMile::class);
    }

    public function toNauticalMile(): NauticalMile
    {
        return $this->toUnit(NauticalMile::class);
    }

    public function toSurveyMile(): SurveyMile
    {
        return $this->toUnit(SurveyMile::class);
    }

    public function toThou(): Thou
    {
        return $this->toUnit(Thou::class);
    }

    public function toYard(): Yard
    {
        return $this->toUnit(Yard::class);
    }

    /**
     * @template T of Length
     * @param class-string<T> $fqn
     * @return T
     */
    public function toUnit(string $fqn): Length
    {
        /** @var T $unit */
        $unit = $fqn::fromMeterValue($this->toMeterValue(), $this->arithmeticOperations);

        return $unit;
    }
}
