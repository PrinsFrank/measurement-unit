<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Weight\Kilogram;
use PrinsFrank\MeasurementUnit\Weight\MetricTon;
use PrinsFrank\MeasurementUnit\Weight\Pound;
use PrinsFrank\MeasurementUnit\Weight\Weight;

class WeightTest extends TestCase
{
    /** @var array<class-string<Weight>> */
    private const WEIGHT_FQN_S = [
        Kilogram::class,
        MetricTon::class,
        Pound::class,
    ];

    /** @dataProvider weightInstances */
    public function testReversibility(Weight $weight): void
    {
        $arithmetics = new ArithmeticOperationsFloatingPoint();

        static::assertEquals($weight, $weight::fromKilogramValue($weight->toKilogramValue(), $arithmetics));
    }

    /** @return iterable<class-string<Weight>> */
    public function weightInstances(): iterable
    {
        foreach (self::WEIGHT_FQN_S as $volumeFQN) {
            yield $volumeFQN => [new $volumeFQN(42.0)];
        }
    }
}
