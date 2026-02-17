<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Torque;

use PrinsFrank\MeasurementUnit\MeasurementUnit;

abstract class Torque extends MeasurementUnit implements TorqueInterface
{
    public function toNewtonMeter(): NewtonMeter
    {
        return $this->toUnit(NewtonMeter::class);
    }

    /**
     * @template T of Torque
     * @param class-string<T> $fqn
     * @return T
     */
    public function toUnit(string $fqn): Torque
    {
        /** @var T $unit */
        $unit = $fqn::fromNewtonMeterValue($this->toNewtonMeterValue(), $this->arithmeticOperations);

        return $unit;
    }
}
