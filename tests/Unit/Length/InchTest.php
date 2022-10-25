<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Length\Inch;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\Inch
 */
class InchTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('″', Inch::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
                             ->method('divide')
                             ->with(42.0, 0.0254)
                             ->willReturn(1653.54330709);

        static::assertSame(1653.54330709, Inch::fromMeterValue(42.0, $arithmeticOperations));
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
                             ->method('multiply')
                             ->with(42.0, 0.0254)
                             ->willReturn(1.0668);

        static::assertSame(1.0668, Inch::toMeterValue(42.0, $arithmeticOperations));
    }
}
