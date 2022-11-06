<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\MeasurementUnit\Torque\NewtonMeter;
use PrinsFrank\MeasurementUnit\Torque\Torque;

/** @covers Torque */
class TorqueTest extends TestCase
{
    /** @var array<class-string<Torque>> */
    private const TORQUE_FQN_S = [
        NewtonMeter::class,
    ];

    /** @dataProvider torqueInstances */
    public function testReversibility(Torque $torque): void
    {
        static::assertEquals($torque, $torque::fromNewtonMeterValue($torque->toNewtonMeterValue(), $torque->arithmeticOperations));
    }

    /** @return iterable<class-string<Torque>, array<Torque>> */
    public function torqueInstances(): iterable
    {
        foreach (self::TORQUE_FQN_S as $torqueFQN) {
            yield $torqueFQN => [new $torqueFQN(42.0)];
        }
    }
}
