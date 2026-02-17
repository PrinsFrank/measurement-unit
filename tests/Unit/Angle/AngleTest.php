<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Angle;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Angle\Degree;
use PrinsFrank\MeasurementUnit\Angle\Radian;
use PrinsFrank\MeasurementUnit\Angle\Angle;
use PrinsFrank\MeasurementUnit\Angle\AngleInterface;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Angle\Angle
 */
class AngleTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstructWithSuppliedArithmeticOperationsInstance(): void
    {
        $arithmeticOperations      = $this->createMock(ArithmeticOperations::class);
        $angle                     = new class (42.0, $arithmeticOperations) extends Angle {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromRadianValue(float $value, ArithmeticOperations $arithmeticOperations): AngleInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toRadianValue(): float
            {
                return 0.733038;
            }
        };

        static::assertSame(42.0, $angle->value);
        static::assertSame($arithmeticOperations, $angle->arithmeticOperations);
    }

    /**
     * @covers ::__construct
     */
    public function testConstructWithoutSuppliedArithmeticOperationsInstance(): void
    {
        $angle = new class (42.0) extends Angle {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromRadianValue(float $value, ArithmeticOperations $arithmeticOperations): AngleInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toRadianValue(): float
            {
                return 0.733038;
            }
        };

        static::assertSame(42.0, $angle->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $angle->arithmeticOperations);
    }

    /**
     * @covers ::toUnit
     * @covers ::toDegree
     * @covers ::toRadian
     */
    public function testToUnit(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);

        $angle = new class (42.0, $arithmeticOperations) extends Angle {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromRadianValue(float $value, ArithmeticOperations $arithmeticOperations): AngleInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toRadianValue(): float
            {
                return 21.0;
            }
        };

        static::assertEquals(new Degree(1203.2113697747288, $arithmeticOperations), $angle->toDegree());
        static::assertEquals(new Radian(21.0, $arithmeticOperations), $angle->toRadian());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $angle = new class (42.0) extends Angle {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromRadianValue(float $value, ArithmeticOperations $arithmeticOperations): AngleInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toRadianValue(): float
            {
                return 0.733038;
            }
        };

        static::assertSame('42 unit', $angle->__toString());
    }
}
