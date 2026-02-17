<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Pressure\Bar;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Pressure\Bar
 */
class BarTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('bar', Bar::getSymbol());
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
            ->with(42.0, 100000)
            ->willReturn(0.00042);

        static::assertEquals(
            new Bar(0.00042, $arithmeticOperations),
            Bar::fromPascalValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 100000)
            ->willReturn(4200000.0);

        static::assertSame(4200000.0, (new Bar(42.0, $arithmeticOperations))->toPascalValue());
    }
}
