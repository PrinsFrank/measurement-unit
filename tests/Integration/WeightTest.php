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
        static::assertEqualsWithDelta($weight, $weight::fromKilogramValue($weight->toKilogramValue(), $weight->arithmeticOperations), 0.000001);
    }

    /** @return iterable<class-string<Weight>, array<Weight>> */
    public function weightInstances(): iterable
    {
        foreach (self::WEIGHT_FQN_S as $weightFQN) {
            yield $weightFQN => [new $weightFQN(42.0)];
        }
    }

    public function testCorrectConversionRate(): void
    {
        static::assertEqualsWithDelta(new Kilogram(42.0), (new Kilogram(42.0))->toKilogram(), 0.000001);
        static::assertEqualsWithDelta(new Kilogram(42000.0), (new MetricTon(42.0))->toKilogram(), 0.000001);
        static::assertEqualsWithDelta(new Kilogram(19.050864), (new Pound(42.0))->toKilogram(), 0.000001);
    }
}
