<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Volume\Quart;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\Quart
 */
class QuartTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('qt', Quart::getSymbol());
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
            ->with(42.0, 0.000946353)
            ->willReturn(44380.9022637);

        static::assertEquals(
            new Quart(44380.9022637, $arithmeticOperations),
            Quart::fromCubicMeterValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 0.000946353)
            ->willReturn(0.039746826);

        static::assertSame(0.039746826, (new Quart(42.0, $arithmeticOperations))->toCubicMeterValue());
    }
}
