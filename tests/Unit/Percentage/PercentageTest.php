<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Percentage;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Percentage\Percent;
use PrinsFrank\MeasurementUnit\Percentage\Percentage;
use PrinsFrank\MeasurementUnit\Percentage\PercentageInterface;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Percentage\Percentage
 */
class PercentageTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstructWithSuppliedArithmeticOperationsInstance(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $percentage               = new class (42.0, $arithmeticOperations) extends Percentage {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPercentValue(float $value, ArithmeticOperations $arithmeticOperations): PercentageInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toPercentValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $percentage->value);
        static::assertSame($arithmeticOperations, $percentage->arithmeticOperations);
    }

    /**
     * @covers ::__construct
     */
    public function testConstructWithoutSuppliedArithmeticOperationsInstance(): void
    {
        $percentage = new class (42.0) extends Percentage {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPercentValue(float $value, ArithmeticOperations $arithmeticOperations): PercentageInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toPercentValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $percentage->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $percentage->arithmeticOperations);
    }

    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        $percentage = new class (42.0) extends Percentage {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPercentValue(float $value, ArithmeticOperations $arithmeticOperations): PercentageInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toPercentValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('unit', $percentage->getSymbol());
    }


    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $percentage = new class (42.0) extends Percentage {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPercentValue(float $value, ArithmeticOperations $arithmeticOperations): PercentageInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toPercentValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $percentage->__toString());
    }
}
