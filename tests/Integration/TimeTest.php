<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Time\Day;
use PrinsFrank\MeasurementUnit\Time\Hour;
use PrinsFrank\MeasurementUnit\Time\Minute;
use PrinsFrank\MeasurementUnit\Time\Second;
use PrinsFrank\MeasurementUnit\Time\Time;

/** @covers Time */
class TimeTest extends TestCase
{
    /** @var array<class-string<Time>> */
    private const TIME_FQN_S = [
        Day::class,
        Hour::class,
        Minute::class,
        Second::class,
    ];

    /** @dataProvider timeInstances */
    public function testReversibility(Time $time): void
    {
        static::assertEquals($time, $time::fromSecondValue($time->toSecondValue(), $time->arithmeticOperations));
    }

    /** @return iterable<class-string<Time>, array<Time>> */
    public function timeInstances(): iterable
    {
        foreach (self::TIME_FQN_S as $timeFQN) {
            yield $timeFQN => [new $timeFQN(42.0)];
        }
    }
}
