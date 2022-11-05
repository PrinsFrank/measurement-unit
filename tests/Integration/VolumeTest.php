<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
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

class VolumeTest extends TestCase
{
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

    /**
     * @dataProvider volumeInstances
     */
    public function testReversibility(Volume $volume): void
    {
        $arithmetics = new ArithmeticOperationsFloatingPoint();

        static::assertSame(42.0, $volume::fromCubicMeterValue($volume::toCubicMeterValue(42.0, $arithmetics), $arithmetics));
    }

    public function volumeInstances(): iterable
    {
        foreach (static::VOLUME_FQN_S as $volumeFQN) {
            yield $volumeFQN => [new $volumeFQN(42.0)];
        }
    }
}
