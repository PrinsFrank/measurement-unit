<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Speed\Knot;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Speed\Knot
 */
class KnotTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('kn', Knot::getSymbol());
    }

    /**
     * @covers ::fromMeterPerSecondValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 0.514444)
            ->willReturn(81.6415392151);

        static::assertEquals(
            new Knot(81.6415392151, $arithmeticOperations),
            Knot::fromMeterPerSecondValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toMeterPerSecondValue
     */
    public function testToMeterPerSecondValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.514444)
            ->willReturn(21.606648);

        static::assertSame(21.606648, (new Knot(42.0, $arithmeticOperations))->toMeterPerSecondValue());
    }
}
