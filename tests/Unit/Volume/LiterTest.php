<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\Liter;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\Liter
 */
class LiterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('l', Liter::getSymbol());
    }

    /**
     * @covers ::fromCubicMeterValue
     */
    public function testFromCubicMeterValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 0.001)
            ->willReturn(42000.0);

        static::assertEquals(
            new Liter(42000.0, $arithmeticOperations),
            Liter::fromCubicMeterValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toCubicMeterValue
     */
    public function testToCubicMeterValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.001)
            ->willReturn(0.042);

        static::assertSame(0.042, (new Liter(42.0, $arithmeticOperations))->toCubicMeterValue());
    }
}
