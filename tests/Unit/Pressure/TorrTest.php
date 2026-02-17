<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Pressure\Torr;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Pressure\Torr
 */
class TorrTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('Torr', Torr::getSymbol());
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
            ->with(42.0, 133.322368421)
            ->willReturn(0.315029);

        static::assertEquals(
            new Torr(0.315029, $arithmeticOperations),
            Torr::fromPascalValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 133.322368421)
            ->willReturn(5599.53947368);

        static::assertSame(5599.53947368, (new Torr(42.0, $arithmeticOperations))->toPascalValue());
    }
}
