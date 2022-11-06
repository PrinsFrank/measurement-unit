<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\Pint;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\Pint
 */
class PintTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('pt', Pint::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.000473176)
            ->willReturn(0.019873392);

        static::assertEquals(
            new Pint(0.019873392, $arithmeticOperations),
            Pint::fromCubicMeterValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 0.000473176)
            ->willReturn(88761.8983211);

        static::assertSame(88761.8983211, (new Pint(42.0, $arithmeticOperations))->toCubicMeterValue());
    }
}
