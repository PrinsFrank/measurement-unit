<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Temperature\Kelvin;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Temperature\Kelvin
 */
class KelvinTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('K', Kelvin::getSymbol());
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        static::assertSame(0.0, Kelvin::toKelvinValue(0.0, new ArithmeticOperationsFloatingPoint()));
        static::assertSame(100.0, Kelvin::toKelvinValue(100.0, new ArithmeticOperationsFloatingPoint()));
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        static::assertSame(0.0, Kelvin::fromKelvinValue(0.0, new ArithmeticOperationsFloatingPoint()));
        static::assertSame(100.0, Kelvin::fromKelvinValue(100.0, new ArithmeticOperationsFloatingPoint()));
    }
}
