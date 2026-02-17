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
     * @covers ::fromKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('subtract')
            ->with(42.0, 273.15)
            ->willReturn(-231.15);

        static::assertEquals(
            new Celsius(-231.15, $arithmeticOperations),
            Celsius::fromKelvinValue(42.0, $arithmeticOperations)
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
            ->with(42.0, 273.15)
            ->willReturn(315.15);

        static::assertSame(315.15, (new Celsius(42.0, $arithmeticOperations))->toKelvinValue());
    }
}
