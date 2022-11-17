<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\CubicYard;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\CubicYard
 */
class CubicYardTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('yd3', CubicYard::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 0.764555)
            ->willReturn(54.9339158072);

        static::assertEquals(
            new CubicYard(54.9339158072, $arithmeticOperations),
            CubicYard::fromCubicMeterValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.764555)
            ->willReturn(32.11131);

        static::assertSame(32.11131, (new CubicYard(42.0, $arithmeticOperations))->toCubicMeterValue());
    }
}
