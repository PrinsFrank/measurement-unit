<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Time implements TimeInterface
{
    protected ArithmeticOperations $arithmeticOperations;

    public function __construct(protected float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

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

    public function toTick(): Tick
    {
        return $this->toUnit(Tick::class);
    }

    public function toCentiTick(): CentiTick
    {
        return $this->toUnit(CentiTick::class);
    }

    /**
     * @template T of TimeInterface
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(string $fqn): Time
    {
        return $fqn::fromSecondValue($this->toSecondValue(), $this->arithmeticOperations);
    }

    public function __toString(): string
    {
        return $this->value . static::getSymbol();
    }
}
