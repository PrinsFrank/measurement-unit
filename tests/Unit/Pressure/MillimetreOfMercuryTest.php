<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Pressure\MillimetreOfMercury;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Pressure\MillimetreOfMercury
 */
class MillimetreOfMercuryTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('mmHg', MillimetreOfMercury::getSymbol());
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
            ->with(42.0, 133.322387415)
            ->willReturn(0.315027);

        static::assertEquals(
            new MillimetreOfMercury(0.315027, $arithmeticOperations),
            MillimetreOfMercury::fromPascalValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 133.322387415)
            ->willReturn(5599.54027143);

        static::assertSame(5599.54027143, (new MillimetreOfMercury(42.0, $arithmeticOperations))->toPascalValue());
    }
}
