<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\FluidDram;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\FluidDram
 */
class FluidDramTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('dr', FluidDram::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.0000036966912)
            ->willReturn(0.00015526103);

        static::assertEquals(
            new FluidDram(0.00015526103, $arithmeticOperations),
            FluidDram::fromCubicMeterValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 0.0000036966912)
            ->willReturn(11361511.6134);

        static::assertSame(11361511.6134, (new FluidDram(42.0, $arithmeticOperations))->toCubicMeterValue());
    }
}
