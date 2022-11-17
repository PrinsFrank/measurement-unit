<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\MeasurementUnit\Temperature\Celsius;
use PrinsFrank\MeasurementUnit\Temperature\Fahrenheit;
use PrinsFrank\MeasurementUnit\Temperature\Kelvin;
use PrinsFrank\MeasurementUnit\Temperature\Rankine;
use PrinsFrank\MeasurementUnit\Temperature\Temperature;

/** @coversNothing */
class TemperatureTest extends TestCase
{
    /** @var array<class-string<Temperature>> */
    private const TEMPERATURE_FQN_S = [
        Celsius::class,
        Fahrenheit::class,
        Kelvin::class,
        Rankine::class,
    ];

    /** @dataProvider temperatureInstances */
    public function testReversibility(Temperature $temperature): void
    {
        static::assertEqualsWithDelta($temperature, $temperature::fromKelvinValue($temperature->toKelvinValue(), $temperature->arithmeticOperations), 0.000001);
    }

    /** @return iterable<class-string<Temperature>, array<Temperature>> */
    public function temperatureInstances(): iterable
    {
        foreach (self::TEMPERATURE_FQN_S as $temperatureFQN) {
            yield $temperatureFQN => [new $temperatureFQN(42.0)];
        }
    }

    public function testCorrectConversionRate(): void
    {
        static::assertEqualsWithDelta(new Kelvin(315.15), (new Celsius(42.0))->toKelvin(), 0.000001);
        static::assertEqualsWithDelta(new Kelvin(278.705555), (new Fahrenheit(42.0))->toKelvin(), 0.000001);
        static::assertEqualsWithDelta(new Kelvin(42.0), (new Kelvin(42.0))->toKelvin(), 0.000001);
        static::assertEqualsWithDelta(new Kelvin(23.333333), (new Rankine(42.0))->toKelvin(), 0.000001);
    }
}
