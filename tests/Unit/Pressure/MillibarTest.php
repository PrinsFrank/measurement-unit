<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Pressure\Millibar;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Pressure\Millibar
 */
class MillibarTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('mbar', Millibar::getSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 100)
            ->willReturn(0.42);

        static::assertEquals(
            new Millibar(0.42, $arithmeticOperations),
            Millibar::fromPascalValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 100)
            ->willReturn(4200.0);

        static::assertSame(4200.0, (new Millibar(42.0, $arithmeticOperations))->toPascalValue());
    }
}
