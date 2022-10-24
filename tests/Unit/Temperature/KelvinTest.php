<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Temperature\Kelvin;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Temperature\Kelvin
 */
class KelvinTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('K', Kelvin::getSymbol());
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        static::assertSame(42.0, Kelvin::toKelvinValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }

    /**
     * @covers ::fromKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        static::assertSame(42.0, Kelvin::fromKelvinValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }
}
