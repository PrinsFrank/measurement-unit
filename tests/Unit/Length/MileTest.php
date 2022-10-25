<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Length\Mile;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\Mile
 */
class MileTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('mi', Mile::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
                             ->method('divide')
                             ->with(42.0, 1609.344)
                             ->willReturn(0.02609759007);

        static::assertSame(0.02609759007, Mile::fromMeterValue(42.0, $arithmeticOperations));
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
                             ->method('multiply')
                             ->with(42.0, 1609.344)
                             ->willReturn(67592.448);

        static::assertSame(67592.448, Mile::toMeterValue(42.0, $arithmeticOperations));
    }
}
