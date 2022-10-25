<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Length\HorseLength;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\HorseLength
 */
class HorseLengthTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('horse-length', HorseLength::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
                             ->method('divide')
                             ->with(42.0, 2.4)
                             ->willReturn(17.5);

        static::assertSame(17.5, HorseLength::fromMeterValue(42.0, $arithmeticOperations));
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
                             ->method('multiply')
                             ->with(42.0, 2.4)
                             ->willReturn(100.8);

        static::assertSame(100.8, HorseLength::toMeterValue(42.0, $arithmeticOperations));
    }
}
