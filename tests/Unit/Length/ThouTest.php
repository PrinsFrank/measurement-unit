<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Length\Thou;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\Thou
 */
class ThouTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('thou', Thou::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 0.0000254)
            ->willReturn(1653543.30709);

        static::assertEquals(
            new Thou(1653543.30709, $arithmeticOperations),
            Thou::fromMeterValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.0000254)
            ->willReturn(0.0010668);

        static::assertSame(0.0010668, (new Thou(42.0, $arithmeticOperations))->toMeterValue());
    }
}
