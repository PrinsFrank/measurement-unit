<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Temperature\Celsius;
use PrinsFrank\MeasurementUnit\Temperature\Fahrenheit;
use PrinsFrank\MeasurementUnit\Temperature\Kelvin;
use PrinsFrank\MeasurementUnit\Temperature\Rankine;
use PrinsFrank\MeasurementUnit\Temperature\Temperature;
use PrinsFrank\MeasurementUnit\Temperature\TemperatureInterface;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Temperature\Temperature
 */
class TemperatureTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstructWithSuppliedArithmeticOperationsInstance(): void
    {
        $arithmeticOperations      = $this->createMock(ArithmeticOperations::class);
        $temperature               = new class (42.0, $arithmeticOperations) extends Temperature {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): TemperatureInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toKelvinValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $temperature->value);
        static::assertSame($arithmeticOperations, $temperature->arithmeticOperations);
    }

    /**
     * @covers ::__construct
     */
    public function testConstructWithoutSuppliedArithmeticOperationsInstance(): void
    {
        $temperature = new class (42.0) extends Temperature {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): TemperatureInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toKelvinValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $temperature->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $temperature->arithmeticOperations);
    }

    /**
     * @covers ::toUnit
     * @covers ::toCelsius
     * @covers ::toFahrenheit
     * @covers ::toKelvin
     * @covers ::toRankine
     */
    public function testToUnit(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::exactly(2))
            ->method('subtract')
            ->willReturn(33.0);
        $arithmeticOperations->expects(self::exactly(2))
            ->method('multiply')
            ->willReturn(33.0);
        $arithmeticOperations->expects(self::exactly(2))
            ->method('divide')
            ->willReturn(33.0);

        $temperature = new class (42.0, $arithmeticOperations) extends Temperature {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): TemperatureInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toKelvinValue(): float
            {
                return 21.0;
            }
        };

        static::assertEquals(new Celsius(33.0, $arithmeticOperations), $temperature->toCelsius());
        static::assertEquals(new Fahrenheit(33.0, $arithmeticOperations), $temperature->toFahrenheit());
        static::assertEquals(new Kelvin(21.0, $arithmeticOperations), $temperature->toKelvin());
        static::assertEquals(new Rankine(33.0, $arithmeticOperations), $temperature->toRankine());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $temperature = new class (42.0) extends Temperature {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromKelvinValue(float $value, ArithmeticOperations $arithmeticOperations): TemperatureInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toKelvinValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $temperature->__toString());
    }
}
