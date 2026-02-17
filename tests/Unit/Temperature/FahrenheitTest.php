<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Temperature\Fahrenheit;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Temperature\Fahrenheit
 */
class FahrenheitTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°F', Fahrenheit::getSymbol());
    }

    /**
     * @covers ::fromKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42, 5)
            ->willReturn(8.4);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(8.4, 9)
            ->willReturn(75.6);
        $arithmeticOperations->expects(self::once())
            ->method('subtract')
            ->with(75.6, 459.67)
            ->willReturn(-384.07);

        static::assertEquals(
            new Fahrenheit(-384.07, $arithmeticOperations),
            Fahrenheit::fromKelvinValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('add')
            ->with(42.0, 459.67)
            ->willReturn(501.67);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(501.67, 5)
            ->willReturn(2508.35);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(2508.35, 9)
            ->willReturn(278.705555556);

        static::assertSame(278.705555556, (new Fahrenheit(42.0, $arithmeticOperations))->toKelvinValue());
    }
}
