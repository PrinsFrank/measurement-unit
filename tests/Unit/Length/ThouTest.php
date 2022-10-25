<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Length\Thou;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\Thou
 */
class ThouTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('thou', Thou::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
                             ->method('divide')
                             ->with(42.0, 39370.078740157)
                             ->willReturn(0.0010668);

        static::assertSame(0.0010668, Thou::fromMeterValue(42.0, $arithmeticOperations));
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
                             ->method('multiply')
                             ->with(42.0, 39370.078740157)
                             ->willReturn(1653543.30709);

        static::assertSame(1653543.30709, Thou::toMeterValue(42.0, $arithmeticOperations));
    }
}
