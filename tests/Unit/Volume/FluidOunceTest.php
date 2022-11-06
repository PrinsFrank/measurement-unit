<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\FluidOunce;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\FluidOunce
 */
class FluidOunceTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('dr', FluidOunce::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.00002957532596)
            ->willReturn(0.00124216369);

        static::assertEquals(
            new FluidOunce(0.00124216369, $arithmeticOperations),
            FluidOunce::fromCubicMeterValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToMeterPerSecondValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 0.00002957532596)
            ->willReturn(1420102.69157);

        static::assertSame(1420102.69157, (new FluidOunce(42.0, $arithmeticOperations))->toCubicMeterValue());
    }
}
