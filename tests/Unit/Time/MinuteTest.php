<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Time\Minute;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Time\Minute
 */
class MinuteTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('min', Minute::getSymbol());
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
            ->with(42.0, 60)
            ->willReturn(0.7);

        static::assertEquals(
            new Minute(0.7, $arithmeticOperations),
            Minute::fromSecondValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 60)
            ->willReturn(2520.0);

        static::assertSame(2520.0, (new Minute(42.0, $arithmeticOperations))->toSecondValue());
    }
}
