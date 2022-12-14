<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\MeasurementUnit\Torque\NewtonMeter;
use PrinsFrank\MeasurementUnit\Torque\Torque;

/** @coversNothing */
class TorqueTest extends TestCase
{
    /** @var array<class-string<Torque>> */
    private const TORQUE_FQN_S = [
        NewtonMeter::class,
    ];

    /** @dataProvider torqueInstances */
    public function testReversibility(Torque $torque): void
    {
        static::assertEqualsWithDelta($torque, $torque::fromNewtonMeterValue($torque->toNewtonMeterValue(), $torque->arithmeticOperations), 0.000001);
    }

    /** @return iterable<class-string<Torque>, array<Torque>> */
    public function torqueInstances(): iterable
    {
        foreach (self::TORQUE_FQN_S as $torqueFQN) {
            yield $torqueFQN => [new $torqueFQN(42.0)];
        }
    }

    public function testCorrectConversionRate(): void
    {
        static::assertEqualsWithDelta(new NewtonMeter(42.0), (new NewtonMeter(42.0))->toNewtonMeter(), 0.000001);
    }
}
