<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Pressure;

use PrinsFrank\MeasurementUnit\MeasurementUnit;

abstract class Pressure extends MeasurementUnit implements PressureInterface
{
    public function toBar(): Bar
    {
        return $this->toUnit(Bar::class);
    }

    public function toHectopascal(): Hectopascal
    {
        return $this->toUnit(Hectopascal::class);
    }

    public function toKilopascal(): Kilopascal
    {
        return $this->toUnit(Kilopascal::class);
    }

    public function toMillibar(): Millibar
    {
        return $this->toUnit(Millibar::class);
    }

    public function toMillimetreOfMercury(): MillimetreOfMercury
    {
        return $this->toUnit(MillimetreOfMercury::class);
    }

    public function toPascal(): Pascal
    {
        return $this->toUnit(Pascal::class);
    }

    public function toPoundPerSquareInch(): PoundPerSquareInch
    {
        return $this->toUnit(PoundPerSquareInch::class);
    }

    public function toStandardAtmosphere(): StandardAtmosphere
    {
        return $this->toUnit(StandardAtmosphere::class);
    }

    public function toTorr(): Torr
    {
        return $this->toUnit(Torr::class);
    }

    /**
     * @template T of Pressure
     * @param class-string<T> $fqn
     * @return T
     */
    public function toUnit(string $fqn): Pressure
    {
        /** @var T $unit */
        $unit = $fqn::fromPascalValue($this->toPascalValue(), $this->arithmeticOperations);

        return $unit;
    }
}
