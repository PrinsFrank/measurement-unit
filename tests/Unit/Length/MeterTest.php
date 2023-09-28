<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Length;

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
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);

        static::assertEquals(
            new Meter(42.0, $arithmeticOperations),
            Meter::fromMeterValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        static::assertSame(42.0, (new Meter(42.0, $this->createMock(ArithmeticOperations::class)))->toMeterValue());
    }
}
