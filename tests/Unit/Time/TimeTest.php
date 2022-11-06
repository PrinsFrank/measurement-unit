<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
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
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $length = new class (42.0, $arithmeticOperations) extends Time {
            public static function getSymbol(): string
            {
                return 'foo';
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

        static::assertSame(42.0, $length->value);
        static::assertSame($arithmeticOperations, $length->arithmeticOperations);
    }

    /**
     * @covers ::__construct
     */
    public function testConstructWithoutSuppliedArithmeticOperationsInstance(): void
    {
        $length = new class (42.0) extends Time {
            public static function getSymbol(): string
            {
                return 'foo';
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

        static::assertSame(42.0, $length->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $length->arithmeticOperations);
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $length = new class (42.0) extends Time {
            public static function getSymbol(): string
            {
                return 'foo';
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

        static::assertSame('42foo', $length->__toString());
    }
}
