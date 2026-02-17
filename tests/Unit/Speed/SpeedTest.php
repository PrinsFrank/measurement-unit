<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Speed\KilometerPerHour;
use PrinsFrank\MeasurementUnit\Speed\Knot;
use PrinsFrank\MeasurementUnit\Speed\MeterPerSecond;
use PrinsFrank\MeasurementUnit\Speed\MilesPerHour;
use PrinsFrank\MeasurementUnit\Speed\Speed;
use PrinsFrank\MeasurementUnit\Speed\SpeedInterface;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Speed\Speed
 */
class SpeedTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstructWithSuppliedArithmeticOperationsInstance(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $speed                = new class (42.0, $arithmeticOperations) extends Speed {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): SpeedInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toMeterPerSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $speed->value);
        static::assertSame($arithmeticOperations, $speed->arithmeticOperations);
    }

    /**
     * @covers ::__construct
     */
    public function testConstructWithoutSuppliedArithmeticOperationsInstance(): void
    {
        $speed = new class (42.0) extends Speed {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): SpeedInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toMeterPerSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $speed->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $speed->arithmeticOperations);
    }

    /**
     * @covers ::toUnit
     * @covers ::toKilometerPerHour
     * @covers ::toKnot
     * @covers ::toMeterPerSecond
     * @covers ::toMilesPerHour
     */
    public function testToUnit(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::exactly(3))
            ->method('divide')
            ->willReturn(33.0);

        $speed = new class (42.0, $arithmeticOperations) extends Speed {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): SpeedInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toMeterPerSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertEquals(new KilometerPerHour(33.0, $arithmeticOperations), $speed->toKilometerPerHour());
        static::assertEquals(new MeterPerSecond(21.0, $arithmeticOperations), $speed->toMeterPerSecond());
        static::assertEquals(new MilesPerHour(33.0, $arithmeticOperations), $speed->toMilesPerHour());
        static::assertEquals(new Knot(33.0, $arithmeticOperations), $speed->toKnot());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $speed = new class (42.0) extends Speed {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterPerSecondValue(float $value, ArithmeticOperations $arithmeticOperations): SpeedInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toMeterPerSecondValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $speed->__toString());
    }
}
