<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Pressure\Kilopascal;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Pressure\Kilopascal
 */
class KilopascalTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('kPa', Kilopascal::getSymbol());
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
            ->with(42.0, 1000)
            ->willReturn(0.042);

        static::assertEquals(
            new Kilopascal(0.042, $arithmeticOperations),
            Kilopascal::fromPascalValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 1000)
            ->willReturn(42000.0);

        static::assertSame(42000.0, (new Kilopascal(42.0, $arithmeticOperations))->toPascalValue());
    }
}
