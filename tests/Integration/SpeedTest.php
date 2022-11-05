<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Length\Length;
use PrinsFrank\MeasurementUnit\Speed\KilometerPerHour;
use PrinsFrank\MeasurementUnit\Speed\MeterPerSecond;
use PrinsFrank\MeasurementUnit\Speed\MilesPerHour;
use PrinsFrank\MeasurementUnit\Speed\Speed;

class SpeedTest extends TestCase
{
    /** @var array<class-string<Speed>> */
    private const SPEED_FQN_S = [
        KilometerPerHour::class,
        MeterPerSecond::class,
        MilesPerHour::class,
    ];

    /** @dataProvider speedInstances */
    public function testReversibility(Speed $speed): void
    {
        $arithmetics = new ArithmeticOperationsFloatingPoint();

        static::assertEquals($speed, $speed::fromMeterPerSecondValue($speed->toMeterPerSecondValue(), $arithmetics));
    }

    /** @return iterable<class-string<Speed>, array<Speed>> */
    public function speedInstances(): iterable
    {
        foreach (self::SPEED_FQN_S as $speedFQN) {
            yield $speedFQN => [new $speedFQN(42.0)];
        }
    }
}
