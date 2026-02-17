<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Pressure\Bar;
use PrinsFrank\MeasurementUnit\Pressure\Hectopascal;
use PrinsFrank\MeasurementUnit\Pressure\Kilopascal;
use PrinsFrank\MeasurementUnit\Pressure\Millibar;
use PrinsFrank\MeasurementUnit\Pressure\MillimetreOfMercury;
use PrinsFrank\MeasurementUnit\Pressure\Pascal;
use PrinsFrank\MeasurementUnit\Pressure\PoundPerSquareInch;
use PrinsFrank\MeasurementUnit\Pressure\Pressure;
use PrinsFrank\MeasurementUnit\Pressure\PressureInterface;
use PrinsFrank\MeasurementUnit\Pressure\StandardAtmosphere;
use PrinsFrank\MeasurementUnit\Pressure\Torr;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Pressure\Pressure
 */
class PressureTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstructWithSuppliedArithmeticOperationsInstance(): void
    {
        $arithmeticOperations   = $this->createMock(ArithmeticOperations::class);
        $pressure               = new class (42.0, $arithmeticOperations) extends Pressure {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): PressureInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $pressure->value);
        static::assertSame($arithmeticOperations, $pressure->arithmeticOperations);
    }

    /**
     * @covers ::__construct
     */
    public function testConstructWithoutSuppliedArithmeticOperationsInstance(): void
    {
        $pressure = new class (42.0) extends Pressure {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): PressureInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $pressure->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $pressure->arithmeticOperations);
    }

    /**
     * @covers ::toUnit
     * @covers ::toBar
     * @covers ::toHectopascal
     * @covers ::toKilopascal
     * @covers ::toMillibar
     * @covers ::toMillimetreOfMercury
     * @covers ::toPascal
     * @covers ::toPoundPerSquareInch
     * @covers ::toStandardAtmosphere
     * @covers ::toTorr
     */
    public function testToUnit(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::exactly(8))
            ->method('divide')
            ->willReturn(33.0);

        $pressure = new class (42.0, $arithmeticOperations) extends Pressure {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): PressureInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }
        };

        static::assertEquals(new Bar(33.0, $arithmeticOperations), $pressure->toBar());
        static::assertEquals(new Hectopascal(33.0, $arithmeticOperations), $pressure->toHectopascal());
        static::assertEquals(new Kilopascal(33.0, $arithmeticOperations), $pressure->toKilopascal());
        static::assertEquals(new Millibar(33.0, $arithmeticOperations), $pressure->toMillibar());
        static::assertEquals(new MillimetreOfMercury(33.0, $arithmeticOperations), $pressure->toMillimetreOfMercury());
        static::assertEquals(new Pascal(21.0, $arithmeticOperations), $pressure->toPascal());
        static::assertEquals(new PoundPerSquareInch(33.0, $arithmeticOperations), $pressure->toPoundPerSquareInch());
        static::assertEquals(new StandardAtmosphere(33.0, $arithmeticOperations), $pressure->toStandardAtmosphere());
        static::assertEquals(new Torr(33.0, $arithmeticOperations), $pressure->toTorr());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $pressure = new class (42.0) extends Pressure {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromPascalValue(float $value, ArithmeticOperations $arithmeticOperations): PressureInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toPascalValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $pressure->__toString());
    }
}
