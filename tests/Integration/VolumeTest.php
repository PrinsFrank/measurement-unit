<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\MeasurementUnit\Volume\CubicInch;
use PrinsFrank\MeasurementUnit\Volume\CubicMeter;
use PrinsFrank\MeasurementUnit\Volume\CubicYard;
use PrinsFrank\MeasurementUnit\Volume\FluidDram;
use PrinsFrank\MeasurementUnit\Volume\FluidOunce;
use PrinsFrank\MeasurementUnit\Volume\Liter;
use PrinsFrank\MeasurementUnit\Volume\Pint;
use PrinsFrank\MeasurementUnit\Volume\Quart;
use PrinsFrank\MeasurementUnit\Volume\TableSpoon;
use PrinsFrank\MeasurementUnit\Volume\Volume;

/** @coversNothing */
class VolumeTest extends TestCase
{
    /** @var array<class-string<Volume>> */
    private const VOLUME_FQN_S = [
        CubicInch::class,
        CubicMeter::class,
        CubicYard::class,
        FluidDram::class,
        FluidOunce::class,
        Liter::class,
        Pint::class,
        Quart::class,
        TableSpoon::class,
    ];

    /** @dataProvider volumeInstances */
    public function testReversibility(Volume $volume): void
    {
        static::assertEqualsWithDelta($volume, $volume::fromCubicMeterValue($volume->toCubicMeterValue(), $volume->arithmeticOperations), 0.000001);
    }

    /** @return iterable<class-string<Volume>, array<Volume>> */
    public function volumeInstances(): iterable
    {
        foreach (self::VOLUME_FQN_S as $volumeFQN) {
            yield $volumeFQN => [new $volumeFQN(42.0)];
        }
    }

    public function testCorrectConversionRate(): void
    {
        static::assertEqualsWithDelta(new CubicMeter(0.0006882582), (new CubicInch(42.0))->toCubicMeter(), 0.000001);
        static::assertEqualsWithDelta(new CubicMeter(42.0), (new CubicMeter(42.0))->toCubicMeter(), 0.000001);
        static::assertEqualsWithDelta(new CubicMeter(32.1113099), (new CubicYard(42.0))->toCubicMeter(), 0.000001);
        static::assertEqualsWithDelta(new CubicMeter(0.000155261), (new FluidDram(42.0))->toCubicMeter(), 0.000001);
        static::assertEqualsWithDelta(new CubicMeter(0.00124209), (new FluidOunce(42.0))->toCubicMeter(), 0.000001);
        static::assertEqualsWithDelta(new CubicMeter(0.042), (new Liter(42.0))->toCubicMeter(), 0.000001);
        static::assertEqualsWithDelta(new CubicMeter(0.019873392), (new Pint(42.0))->toCubicMeter(), 0.000001);
        static::assertEqualsWithDelta(new CubicMeter(0.0397468), (new Quart(42.0))->toCubicMeter(), 0.000001);
        static::assertEqualsWithDelta(new CubicMeter(0.000621044), (new TableSpoon(42.0))->toCubicMeter(), 0.000001);
    }
}
