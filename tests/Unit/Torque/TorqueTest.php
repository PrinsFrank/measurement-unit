<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Torque;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\ArithmeticOperationsFloatingPoint\ArithmeticOperationsFloatingPoint;
use PrinsFrank\MeasurementUnit\Torque\NewtonMeter;
use PrinsFrank\MeasurementUnit\Torque\Torque;
use PrinsFrank\MeasurementUnit\Torque\TorqueInterface;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Torque\Torque
 */
class TorqueTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testConstructWithSuppliedArithmeticOperationsInstance(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $torque               = new class (42.0, $arithmeticOperations) extends Torque {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): TorqueInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $torque->value);
        static::assertSame($arithmeticOperations, $torque->arithmeticOperations);
    }

    /**
     * @covers ::__construct
     */
    public function testConstructWithoutSuppliedArithmeticOperationsInstance(): void
    {
        $torque = new class (42.0) extends Torque {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): TorqueInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame(42.0, $torque->value);
        static::assertInstanceOf(ArithmeticOperationsFloatingPoint::class, $torque->arithmeticOperations);
    }

    /**
     * @covers ::toUnit
     * @covers ::toNewtonMeter
     */
    public function testToUnit(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);

        $torque = new class (42.0, $arithmeticOperations) extends Torque {
            public static function getSymbol(): string
            {
                return '';
            }

            public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): TorqueInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertEquals(new NewtonMeter(21.0, $arithmeticOperations), $torque->toNewtonMeter());
    }

    /**
     * @covers ::__toString
     */
    public function testToString(): void
    {
        $torque = new class (42.0) extends Torque {
            public static function getSymbol(): string
            {
                return 'unit';
            }

            public static function fromNewtonMeterValue(float $value, ArithmeticOperations $arithmeticOperations): TorqueInterface
            {
                return new self($value, $arithmeticOperations);
            }

            public function toNewtonMeterValue(): float
            {
                return 21.0;
            }
        };

        static::assertSame('42 unit', $torque->__toString());
    }
}
