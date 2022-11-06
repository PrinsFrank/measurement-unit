<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\Quart;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\Quart
 */
class QuartTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('qt', Quart::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.000946353)
            ->willReturn(0.039746826);

        static::assertEquals(
            new Quart(0.039746826, $arithmeticOperations),
            Quart::fromCubicMeterValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 0.000946353)
            ->willReturn(44380.9022637);

        static::assertSame(44380.9022637, (new Quart(42.0, $arithmeticOperations))->toCubicMeterValue());
    }
}
