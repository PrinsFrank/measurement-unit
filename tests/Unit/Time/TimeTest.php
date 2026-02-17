<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Time\Day;
use PrinsFrank\MeasurementUnit\Time\Hour;
use PrinsFrank\MeasurementUnit\Time\Minute;
use PrinsFrank\MeasurementUnit\Time\Second;
use PrinsFrank\MeasurementUnit\Time\Time;
use PrinsFrank\MeasurementUnit\Time\TimeInterface;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Time\Time
 */
class TimeTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstructWithSuppliedArithmeticOperationsInstance(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $time                 = new class (42.0, $arithmeticOperations) extends Time {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): TimeInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $time->value);
        static::assertSame($arithmeticOperations, $time->arithmeticOperations);
    }

    /**
     * @covers ::__construct
     */
    public function testConstructWithoutSuppliedArithmeticOperationsInstance(): void
    {
        $time = new class (42.0) extends Time {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): TimeInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $time->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $time->arithmeticOperations);
    }

    /**
     * @covers ::toUnit
     * @covers ::toDay
     * @covers ::toHour
     * @covers ::toMinute
     * @covers ::toSecond
     */
    public function testToUnit(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::exactly(3))
            ->method('divide')
            ->willReturn(33.0);

        $time = new class (42.0, $arithmeticOperations) extends Time {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): TimeInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertEquals(new Day(33.0, $arithmeticOperations), $time->toDay());
        static::assertEquals(new Hour(33.0, $arithmeticOperations), $time->toHour());
        static::assertEquals(new Minute(33.0, $arithmeticOperations), $time->toMinute());
        static::assertEquals(new Second(21.0, $arithmeticOperations), $time->toSecond());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $time = new class (42.0) extends Time {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromSecondValue(float $value, ArithmeticOperations $arithmeticOperations): TimeInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $time->__toString());
    }
}
