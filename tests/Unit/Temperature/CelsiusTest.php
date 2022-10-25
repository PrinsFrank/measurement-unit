<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Temperature\Celsius;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Temperature\Celsius
 */
class CelsiusTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°C', Celsius::getSymbol());
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('add')
            ->with(42.0, 273.15)
            ->willReturn(315.15);

        static::assertSame(315.15, Celsius::toKelvinValue(42.0, $arithmeticOperations));
    }

    /**
     * @covers ::fromKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('subtract')
            ->with(42.0, 273.15)
            ->willReturn(-231.15);

        static::assertSame(-231.15, Celsius::fromKelvinValue(42.0, $arithmeticOperations));
    }
}
