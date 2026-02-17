<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Angle;

use PrinsFrank\MeasurementUnit\MeasurementUnit;

abstract class Angle extends MeasurementUnit implements AngleInterface
{


    public function toDegree(): Degree
    {
        return $this->toUnit(Degree::class);
    }
    public function toRadian(): Radian
    {
        return $this->toUnit(Radian::class);
    }

    /**
     * @template T of Angle
     * @param class-string<T> $fqn
     * @return T
     */
    public function toUnit(string $fqn): Angle
    {
        /** @var T $unit */
        $unit = $fqn::fromRadianValue($this->toRadianValue(), $this->arithmeticOperations);

        return $unit;
    }
}
