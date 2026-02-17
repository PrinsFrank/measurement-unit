<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Torque;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Torque\NewtonMeter;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Torque\NewtonMeter
 */
class NewtonMeterTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('N⋅m', NewtonMeter::getSymbol());
    }

    /**
     * @covers ::fromNewtonMeterValue
     */
    public function testFromNewtonMeter(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);

        static::assertEquals(
            new NewtonMeter(42.0, $arithmeticOperations),
            NewtonMeter::fromNewtonMeterValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toNewtonMeterValue
     */
    public function testToNewtonMeter(): void
    {
        static::assertSame(42.0, (new NewtonMeter(42.0, $this->createMock(ArithmeticOperations::class)))->toNewtonMeterValue());
    }
}
