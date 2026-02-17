<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Length\HorseLength;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\HorseLength
 */
class HorseLengthTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('hl', HorseLength::getSymbol());
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
            ->with(42.0, 2.4)
            ->willReturn(17.5);

        static::assertEquals(
            new Horselength(17.5, $arithmeticOperations),
            HorseLength::fromMeterValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 2.4)
            ->willReturn(100.8);

        static::assertSame(100.8, (new HorseLength(42.0, $arithmeticOperations))->toMeterValue());
    }
}
