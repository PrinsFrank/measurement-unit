<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Time\Day;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Time\Day
 */
class DayTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('d', Day::getSymbol());
    }

    /**
     * @covers ::fromSecondValue
     */
    public function testFromSecondValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 86400)
            ->willReturn(0.00048611111);

        static::assertEquals(
            new Day(0.00048611111, $arithmeticOperations),
            Day::fromSecondValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toSecondValue
     */
    public function testToSecondValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 86400)
            ->willReturn(3628800.0);

        static::assertSame(3628800.0, (new Day(42.0, $arithmeticOperations))->toSecondValue());
    }
}
