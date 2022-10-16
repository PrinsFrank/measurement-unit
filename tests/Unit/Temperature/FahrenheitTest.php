<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Temperature\Fahrenheit;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Temperature\Fahrenheit
 */
class FahrenheitTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°F', Fahrenheit::getSymbol());
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        static::assertEqualsWithDelta(0.0, Fahrenheit::toKelvinValue(-459.67, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(77.35, Fahrenheit::toKelvinValue(-320.44, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(195.15, Fahrenheit::toKelvinValue(-108.4, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(233.15, Fahrenheit::toKelvinValue(-40, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(273.1499, Fahrenheit::toKelvinValue(31.9998, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(293.15, Fahrenheit::toKelvinValue(68.0, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(310.15, Fahrenheit::toKelvinValue(98.6, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(373.1339, Fahrenheit::toKelvinValue(211.971, new ArithmeticOperationsFloatingPoint()), 0.01);
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        static::assertEqualsWithDelta(-459.67, Fahrenheit::fromKelvinValue(0.0, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(-320.44, Fahrenheit::fromKelvinValue(77.35, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(-108.4, Fahrenheit::fromKelvinValue(195.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(-40, Fahrenheit::fromKelvinValue(233.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(31.9998, Fahrenheit::fromKelvinValue(273.1499, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(68.0, Fahrenheit::fromKelvinValue(293.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(98.6, Fahrenheit::fromKelvinValue(310.15, new ArithmeticOperationsFloatingPoint()), 0.01);
        static::assertEqualsWithDelta(211.971, Fahrenheit::fromKelvinValue(373.1339, new ArithmeticOperationsFloatingPoint()), 0.01);
    }
}
