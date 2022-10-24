<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Length\Meter;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\Meter
 */
class MeterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('m', Meter::getSymbol());
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertSame(42.0, Meter::toMeterValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        static::assertSame(42.0, Meter::fromMeterValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }
}
