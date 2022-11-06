<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\CubicInch;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\CubicInch
 */
class CubicInchTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('in3', CubicInch::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 61023.744095)
            ->willReturn(2562997.25199);

        static::assertEquals(
            new CubicInch(2562997.25199, $arithmeticOperations),
            CubicInch::fromCubicMeterValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 61023.744095)
            ->willReturn(0.00068825668);

        static::assertSame(0.00068825668, (new CubicInch(42.0, $arithmeticOperations))->toCubicMeterValue());
    }
}
