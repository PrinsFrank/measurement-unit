<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\MeasurementUnit\Speed\KilometerPerHour;
use PrinsFrank\MeasurementUnit\Speed\Knot;
use PrinsFrank\MeasurementUnit\Speed\MeterPerSecond;
use PrinsFrank\MeasurementUnit\Speed\MilesPerHour;
use PrinsFrank\MeasurementUnit\Speed\Speed;

/** @coversNothing */
class SpeedTest extends TestCase
{
    /** @var array<class-string<Speed>> */
    private const SPEED_FQN_S = [
        KilometerPerHour::class,
        Knot::class,
        MeterPerSecond::class,
        MilesPerHour::class,
    ];

    /** @dataProvider speedInstances */
    public function testReversibility(Speed $speed): void
    {
        static::assertEqualsWithDelta($speed, $speed::fromMeterPerSecondValue($speed->toMeterPerSecondValue(), $speed->arithmeticOperations), 0.000001);
    }

    /** @return iterable<class-string<Speed>, array<Speed>> */
    public function speedInstances(): iterable
    {
        foreach (self::SPEED_FQN_S as $speedFQN) {
            yield $speedFQN => [new $speedFQN(42.0)];
        }
    }

    public function testCorrectConversionRate(): void
    {
        static::assertEqualsWithDelta(new MeterPerSecond(11.666676), (new KilometerPerHour(42.0))->toMeterPerSecond(), 0.000001);
        static::assertEqualsWithDelta(new MeterPerSecond(21.606648), (new Knot(42.0))->toMeterPerSecond(), 0.000001);
        static::assertEqualsWithDelta(new MeterPerSecond(42.0), (new MeterPerSecond(42.0))->toMeterPerSecond(), 0.000001);
        static::assertEqualsWithDelta(new MeterPerSecond(18.77568), (new MilesPerHour(42.0))->toMeterPerSecond(), 0.000001);
    }
}
