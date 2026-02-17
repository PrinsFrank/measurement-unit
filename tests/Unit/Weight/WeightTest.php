<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Weight;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Weight\Kilogram;
use PrinsFrank\MeasurementUnit\Weight\MetricTon;
use PrinsFrank\MeasurementUnit\Weight\Pound;
use PrinsFrank\MeasurementUnit\Weight\Weight;
use PrinsFrank\MeasurementUnit\Weight\WeightInterface;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Weight\Weight
 */
class WeightTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstructWithSuppliedArithmeticOperationsInstance(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $weight               = new class (42.0, $arithmeticOperations) extends Weight {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): WeightInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toKilogramValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $weight->value);
        static::assertSame($arithmeticOperations, $weight->arithmeticOperations);
    }

    /**
     * @covers ::__construct
     */
    public function testConstructWithoutSuppliedArithmeticOperationsInstance(): void
    {
        $weight = new class (42.0) extends Weight {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): WeightInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toKilogramValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $weight->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $weight->arithmeticOperations);
    }

    /**
     * @covers ::toUnit
     * @covers ::toKilogram
     * @covers ::toMetricTon
     * @covers ::toPound
     */
    public function testToUnit(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::exactly(2))
            ->method('divide')
            ->willReturn(33.0);

        $speed = new class (42.0, $arithmeticOperations) extends Weight {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): WeightInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toKilogramValue(): float
            {
                return 21.0;
            }
        };

        static::assertEquals(new Kilogram(21.0, $arithmeticOperations), $speed->toKilogram());
        static::assertEquals(new MetricTon(33.0, $arithmeticOperations), $speed->toMetricTon());
        static::assertEquals(new Pound(33.0, $arithmeticOperations), $speed->toPound());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $weight = new class (42.0) extends Weight {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKilogramValue(float $value, ArithmeticOperations $arithmeticOperations): WeightInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toKilogramValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $weight->__toString());
    }
}
