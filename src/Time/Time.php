<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;

abstract class Time implements TimeInterface
{
    private ArithmeticOperations $arithmeticOperations;

    public function __construct(protected float $value, ?ArithmeticOperations $arithmeticOperations = null)
    {
        $this->arithmeticOperations = $arithmeticOperations ?? new ArithmeticOperationsFloatingPoint();
    }

    public function toSecond(): Second
    {
        return $this->toUnit($this->value, Second::class);
    }

    public function toMinute(): Minute
    {
        return $this->toUnit($this->value, Minute::class);
    }

    public function toHour(): Second
    {
        return $this->toUnit($this->value, Hour::class);
    }

    public function toDay(): Day
    {
        return $this->toUnit($this->value, Day::class);
    }

    public function toTick(): Tick
    {
        return $this->toUnit($this->value, Tick::class);
    }

    public function toCentiTick(): CentiTick
    {
        return $this->toUnit($this->value, CentiTick::class);
    }

    /**
     * @template T of Time
     * @param class-string<T> $fqn
     * @return T
     */
    protected function toUnit(float $value, string $fqn): Time
    {
        return new $fqn(
            $fqn::fromSecondValue(
                static::toSecondValue($value, $this->arithmeticOperations),
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
