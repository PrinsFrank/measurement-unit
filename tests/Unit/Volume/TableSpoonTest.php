<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\TableSpoon;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\TableSpoon
 */
class TableSpoonTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('tbsp', TableSpoon::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.000015)
            ->willReturn(0.00063);

        static::assertEquals(
            new TableSpoon(0.00063, $arithmeticOperations),
            TableSpoon::fromCubicMeterValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 0.000015)
            ->willReturn(2800000.0);

        static::assertSame(2800000.0, (new TableSpoon(42.0, $arithmeticOperations))->toCubicMeterValue());
    }
}
