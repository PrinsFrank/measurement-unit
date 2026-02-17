<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Volume;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Volume\CubicInch;
use PrinsFrank\MeasurementUnit\Volume\CubicMeter;
use PrinsFrank\MeasurementUnit\Volume\CubicYard;
use PrinsFrank\MeasurementUnit\Volume\FluidDram;
use PrinsFrank\MeasurementUnit\Volume\FluidOunce;
use PrinsFrank\MeasurementUnit\Volume\Liter;
use PrinsFrank\MeasurementUnit\Volume\Pint;
use PrinsFrank\MeasurementUnit\Volume\Quart;
use PrinsFrank\MeasurementUnit\Volume\TableSpoon;
use PrinsFrank\MeasurementUnit\Volume\Volume;
use PrinsFrank\MeasurementUnit\Volume\VolumeInterface;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Volume\Volume
 */
class VolumeTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstructWithSuppliedArithmeticOperationsInstance(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $volume               = new class (42.0, $arithmeticOperations) extends Volume {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): VolumeInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toCubicMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $volume->value);
        static::assertSame($arithmeticOperations, $volume->arithmeticOperations);
    }

    /**
     * @covers ::__construct
     */
    public function testConstructWithoutSuppliedArithmeticOperationsInstance(): void
    {
        $volume = new class (42.0) extends Volume {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): VolumeInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toCubicMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $volume->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $volume->arithmeticOperations);
    }

    /**
     * @covers ::toUnit
     * @covers ::toCubicInch
     * @covers ::toCubicMeter
     * @covers ::toCubicYard
     * @covers ::toFluidDram
     * @covers ::toFluidOunce
     * @covers ::toLiter
     * @covers ::toPint
     * @covers ::toQuart
     * @covers ::toTableSpoon
     */
    public function testToUnit(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::exactly(8))
            ->method('divide')
            ->willReturn(33.0);

        $volume = new class (42.0, $arithmeticOperations) extends Volume {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): VolumeInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toCubicMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertEquals(new CubicInch(33.0, $arithmeticOperations), $volume->toCubicInch());
        static::assertEquals(new CubicMeter(21.0, $arithmeticOperations), $volume->toCubicMeter());
        static::assertEquals(new CubicYard(33.0, $arithmeticOperations), $volume->toCubicYard());
        static::assertEquals(new FluidDram(33.0, $arithmeticOperations), $volume->toFluidDram());
        static::assertEquals(new FluidOunce(33.0, $arithmeticOperations), $volume->toFluidOunce());
        static::assertEquals(new Liter(33.0, $arithmeticOperations), $volume->toLiter());
        static::assertEquals(new Pint(33.0, $arithmeticOperations), $volume->toPint());
        static::assertEquals(new Quart(33.0, $arithmeticOperations), $volume->toQuart());
        static::assertEquals(new TableSpoon(33.0, $arithmeticOperations), $volume->toTableSpoon());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $volume = new class (42.0) extends Volume {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromCubicMeterValue(float $value, ArithmeticOperations $arithmeticOperations): VolumeInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toCubicMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $volume->__toString());
    }
}
