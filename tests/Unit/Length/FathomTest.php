<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Length\Fathom;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\Fathom
 */
class FathomTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('ftm', Fathom::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 1.8288)
            ->willReturn(22.9658792651);

        static::assertSame(22.9658792651, Fathom::fromMeterValue(42.0, $arithmeticOperations));
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 1.8288)
            ->willReturn(76.8096);

        static::assertSame(76.8096, Fathom::toMeterValue(42.0, $arithmeticOperations));
    }
}
