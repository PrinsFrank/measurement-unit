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

/** @covers Volume */
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
        static::assertEquals($volume, $volume::fromCubicMeterValue($volume->toCubicMeterValue(), $volume->arithmeticOperations));
    }

    /** @return iterable<class-string<Volume>, array<Volume>> */
    public function volumeInstances(): iterable
    {
        foreach (self::VOLUME_FQN_S as $volumeFQN) {
            yield $volumeFQN => [new $volumeFQN(42.0)];
        }
    }
}
