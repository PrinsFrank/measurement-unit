<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\CubicMeter;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\CubicMeter
 */
class CubicMeterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('m3', CubicMeter::getSymbol());
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertSame(42.0, CubicMeter::toCubicMeterValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        static::assertSame(42.0, CubicMeter::fromCubicMeterValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }
}
