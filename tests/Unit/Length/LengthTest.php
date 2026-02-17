<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Length\Fathom;
use PrinsFrank\MeasurementUnit\Length\Foot;
use PrinsFrank\MeasurementUnit\Length\Furlong;
use PrinsFrank\MeasurementUnit\Length\HorseLength;
use PrinsFrank\MeasurementUnit\Length\Inch;
use PrinsFrank\MeasurementUnit\Length\Kilometer;
use PrinsFrank\MeasurementUnit\Length\Length;
use PrinsFrank\MeasurementUnit\Length\LengthInterface;
use PrinsFrank\MeasurementUnit\Length\Meter;
use PrinsFrank\MeasurementUnit\Length\StatuteMile;
use PrinsFrank\MeasurementUnit\Length\NauticalMile;
use PrinsFrank\MeasurementUnit\Length\SurveyMile;
use PrinsFrank\MeasurementUnit\Length\Thou;
use PrinsFrank\MeasurementUnit\Length\Yard;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\Length
 */
class LengthTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstructWithSuppliedArithmeticOperationsInstance(): void
    {
        $arithmeticOperations = $this->getMockBuilder(ArithmeticOperations::class)
            ->disableOriginalConstructor()
            ->getMock();
        $length               = new class (42.0, $arithmeticOperations) extends Length {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): LengthInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toMeterValue(): float
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
        $length = new class (42.0) extends Length {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): LengthInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $length->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $length->arithmeticOperations);
    }

    /**
     * @covers ::toUnit
     * @covers ::toFathom
     * @covers ::toFoot
     * @covers ::toFurlong
     * @covers ::toHorseLength
     * @covers ::toInch
     * @covers ::toMeter
     * @covers ::toStatuteMile
     * @covers ::toNauticalMile
     * @covers ::toSurveyMile
     * @covers ::toThou
     * @covers ::toYard
     * @covers ::toKilometer
     */
    public function testToUnit(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::exactly(11))
            ->method('divide')
            ->willReturn(33.0);

        $length = new class (42.0, $arithmeticOperations) extends Length {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): LengthInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertEquals(new Fathom(33.0, $arithmeticOperations), $length->toFathom());
        static::assertEquals(new Foot(33.0, $arithmeticOperations), $length->toFoot());
        static::assertEquals(new Furlong(33.0, $arithmeticOperations), $length->toFurlong());
        static::assertEquals(new HorseLength(33.0, $arithmeticOperations), $length->toHorseLength());
        static::assertEquals(new Inch(33.0, $arithmeticOperations), $length->toInch());
        static::assertEquals(new Meter(21.0, $arithmeticOperations), $length->toMeter());
        static::assertEquals(new StatuteMile(33.0, $arithmeticOperations), $length->toStatuteMile());
        static::assertEquals(new NauticalMile(33.0, $arithmeticOperations), $length->toNauticalMile());
        static::assertEquals(new SurveyMile(33.0, $arithmeticOperations), $length->toSurveyMile());
        static::assertEquals(new Thou(33.0, $arithmeticOperations), $length->toThou());
        static::assertEquals(new Yard(33.0, $arithmeticOperations), $length->toYard());
        static::assertEquals(new Kilometer(33.0, $arithmeticOperations), $length->toKilometer());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $length = new class (42.0) extends Length {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromMeterValue(float $value, ArithmeticOperations $arithmeticOperations): LengthInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $length->__toString());
    }
}
