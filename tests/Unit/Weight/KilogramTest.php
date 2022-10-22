<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Weight;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Weight\Kilogram;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Weight\Kilogram
 */
class KilogramTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('kg', Kilogram::getSymbol());
    }

    /**
     * @covers ::toKilogramValue
     */
    public function testToMeterPerSecondValue(): void
    {
        static::assertSame(42.0, Kilogram::toKilogramValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }

    /**
     * @covers ::fromKilogramValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        static::assertSame(42.0, Kilogram::fromKilogramValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }
}
