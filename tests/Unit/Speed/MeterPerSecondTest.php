<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Speed\MeterPerSecond;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Speed\MeterPerSecond
 */
class MeterPerSecondTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('m/s', MeterPerSecond::getSymbol());
    }

    /**
     * @covers ::toMeterPerSecondValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertSame(42.0, MeterPerSecond::toMeterPerSecondValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }

    /**
     * @covers ::fromMeterPerSecondValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        static::assertSame(42.0, MeterPerSecond::fromMeterPerSecondValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }
}
