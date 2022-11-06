<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\MeasurementUnit\Weight\Kilogram;
use PrinsFrank\MeasurementUnit\Weight\MetricTon;
use PrinsFrank\MeasurementUnit\Weight\Pound;
use PrinsFrank\MeasurementUnit\Weight\Weight;

/** @coversNothing */
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
        static::assertEquals($weight, $weight::fromKilogramValue($weight->toKilogramValue(), $weight->arithmeticOperations));
    }

    /** @return iterable<class-string<Weight>, array<Weight>> */
    public function weightInstances(): iterable
    {
        foreach (self::WEIGHT_FQN_S as $weightFQN) {
            yield $weightFQN => [new $weightFQN(42.0)];
        }
    }
}
