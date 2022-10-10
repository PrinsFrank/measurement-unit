<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PrinsFrank\MeasurementUnit\Temperature\Celsius;
use PrinsFrank\MeasurementUnit\Temperature\Fahrenheit;
use PrinsFrank\MeasurementUnit\Temperature\Kelvin;
use PrinsFrank\MeasurementUnit\Temperature\Rankine;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Temperature\Temperature
 */
class TemperatureTest extends TestCase
{
    /**
     * @covers ::toCelsius
     * @covers ::toUnit
     */
    public function testToCelsius(): void
    {
        static::assertEqualsWithDelta(new Celsius(42.0), (new Celsius(42.0))->toCelsius(), 0.01);
        static::assertEqualsWithDelta(new Celsius(5.55), (new Fahrenheit(42.0))->toCelsius(), 0.01);
        static::assertEqualsWithDelta(new Celsius(-231.15), (new Kelvin(42.0))->toCelsius(), 0.01);
        static::assertEqualsWithDelta(new Celsius(-249.817), (new Rankine(42.0))->toCelsius(), 0.01);
    }

    /**
     * @covers ::toFahrenheit
     * @covers ::toUnit
     */
    public function testToFahrenheit(): void
    {
        static::assertEqualsWithDelta(new Fahrenheit(107.6), (new Celsius(42.0))->toFahrenheit(), 0.01);
        static::assertEqualsWithDelta(new Fahrenheit(42.0), (new Fahrenheit(42.0))->toFahrenheit(), 0.01);
        static::assertEqualsWithDelta(new Fahrenheit(-384.07), (new Kelvin(42.0))->toFahrenheit(), 0.01);
        static::assertEqualsWithDelta(new Fahrenheit(-417.67), (new Rankine(42.0))->toFahrenheit(), 0.01);
    }

    /**
     * @covers ::toRankine
     * @covers ::toUnit
     */
    public function testToRankine(): void
    {
        static::assertEqualsWithDelta(new Rankine(567.27), (new Celsius(42.0))->toRankine(), 0.01);
        static::assertEqualsWithDelta(new Rankine(501.67), (new Fahrenheit(42.0))->toRankine(), 0.01);
        static::assertEqualsWithDelta(new Rankine(75.6), (new Kelvin(42.0))->toRankine(), 0.01);
        static::assertEqualsWithDelta(new Rankine(42.0), (new Rankine(42.0))->toRankine(), 0.01);
    }

    /**
     * @covers ::toKelvin
     * @covers ::toUnit
     */
    public function testToKelvin(): void
    {
        static::assertEqualsWithDelta(new Kelvin(315.15), (new Celsius(42.0))->toKelvin(), 0.01);
        static::assertEqualsWithDelta(new Kelvin(278.706), (new Fahrenheit(42.0))->toKelvin(), 0.01);
        static::assertEqualsWithDelta(new Kelvin(42.0), (new Kelvin(42.0))->toKelvin(), 0.01);
        static::assertEqualsWithDelta(new Kelvin(23.33), (new Rankine(42.0))->toKelvin(), 0.01);
    }
}
