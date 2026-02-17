<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Time\Hour;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Time\Hour
 */
class HourTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('h', Hour::getSymbol());
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
            ->with(42.0, 3600)
            ->willReturn(0.01166666666);

        static::assertEquals(
            new Hour(0.01166666666, $arithmeticOperations),
            Hour::fromSecondValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 3600)
            ->willReturn(151200.0);

        static::assertSame(151200.0, (new Hour(42.0, $arithmeticOperations))->toSecondValue());
    }
}
