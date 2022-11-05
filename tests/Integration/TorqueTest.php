<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Torque\NewtonMeter;
use PrinsFrank\MeasurementUnit\Torque\Torque;

class TorqueTest extends TestCase
{
    private const TORQUE_FQN_S = [
        NewtonMeter::class,
    ];

    /**
     * @dataProvider torqueInstances
     */
    public function testReversibility(Torque $torque): void
    {
        $arithmetics = new ArithmeticOperationsFloatingPoint();

        static::assertSame(42.0, $torque::fromNewtonMeterValue($torque::toNewtonMeterValue(42.0, $arithmetics), $arithmetics));
    }

    public function torqueInstances(): iterable
    {
        foreach (static::TORQUE_FQN_S as $torqueFQN) {
            yield $torqueFQN => [new $torqueFQN(42.0)];
        }
    }
}
