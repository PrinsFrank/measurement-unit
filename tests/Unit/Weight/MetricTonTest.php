<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Weight;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Weight\MetricTon;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Weight\MetricTon
 */
class MetricTonTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('t', MetricTon::getSymbol());
    }

    /**
     * @covers ::fromKilogramValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 1000)
            ->willReturn(0.042);

        static::assertEquals(
            new MetricTon(0.042, $arithmeticOperations),
            MetricTon::fromKilogramValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toKilogramValue
     */
    public function testToMeterPerSecondValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 1000)
            ->willReturn(42000.0);

        static::assertSame(42000.0, (new MetricTon(42.0, $arithmeticOperations))->toKilogramValue());
    }
}
