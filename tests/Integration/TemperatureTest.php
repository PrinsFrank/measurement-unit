<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Temperature\Celsius;
use PrinsFrank\MeasurementUnit\Temperature\Fahrenheit;
use PrinsFrank\MeasurementUnit\Temperature\Kelvin;
use PrinsFrank\MeasurementUnit\Temperature\Rankine;
use PrinsFrank\MeasurementUnit\Temperature\Temperature;

class TemperatureTest extends TestCase
{
    private const TEMPERATURE_FQN_S = [
        Celsius::class,
        Fahrenheit::class,
        Kelvin::class,
        Rankine::class,
    ];

    /**
     * @dataProvider temperatureInstances
     */
    public function testReversibility(Temperature $temperature): void
    {
        $arithmetics = new ArithmeticOperationsFloatingPoint();

        static::assertEqualsWithDelta($temperature, $temperature::fromKelvinValue($temperature->toKelvinValue(), $arithmetics), 0.000001);
    }

    public function temperatureInstances(): iterable
    {
        foreach (static::TEMPERATURE_FQN_S as $temperatureFQN) {
            yield $temperatureFQN => [new $temperatureFQN(42.0)];
        }
    }
}
