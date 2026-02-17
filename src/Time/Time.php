<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Time;

use PrinsFrank\MeasurementUnit\MeasurementUnit;

abstract class Time extends MeasurementUnit implements TimeInterface
{
    public function toSecond(): Second
    {
        return $this->toUnit(Second::class);
    }

    public function toMinute(): Minute
    {
        return $this->toUnit(Minute::class);
    }

    public function toHour(): Hour
    {
        return $this->toUnit(Hour::class);
    }

    public function toDay(): Day
    {
        return $this->toUnit(Day::class);
    }

    /**
     * @template T of Time
     * @param class-string<T> $fqn
     * @return T
     */
    public function toUnit(string $fqn): Time
    {
        /** @var T $unit */
        $unit = $fqn::fromSecondValue($this->toSecondValue(), $this->arithmeticOperations);

        return $unit;
    }
}
