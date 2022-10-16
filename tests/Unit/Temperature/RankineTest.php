<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Temperature\Rankine;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Temperature\Rankine
 */
class RankineTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°R', Rankine::getSymbol());
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        static::assertEqualsWithDelta(0.0, Rankine::toKelvinValue(0, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(77.35, Rankine::toKelvinValue(139.23, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(195.1, Rankine::toKelvinValue(351.18, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(233.16, Rankine::toKelvinValue(419.69, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(273.1499, Rankine::toKelvinValue(491.6698, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(293.15, Rankine::toKelvinValue(527.67, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(310.15, Rankine::toKelvinValue(558.27, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(373.1339, Rankine::toKelvinValue(671.6410, new ArithmeticOperationsFloatingPoint()), 0.01);
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        static::assertEqualsWithDelta(0, Rankine::fromKelvinValue(0.0, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(139.23, Rankine::fromKelvinValue(77.35, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(351.18, Rankine::fromKelvinValue(195.1, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(419.67, Rankine::fromKelvinValue(233.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(491.6698, Rankine::fromKelvinValue(273.1499, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(527.67, Rankine::fromKelvinValue(293.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(558.27, Rankine::fromKelvinValue(310.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(671.6410, Rankine::fromKelvinValue(373.1339, new ArithmeticOperationsFloatingPoint()), 0.01);
    }
}
