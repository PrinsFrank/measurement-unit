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
     * @covers ::fromKelvinValue
     */
    public function testFromKelvinValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);

        static::assertEquals(
            new Kelvin(42.0, $arithmeticOperations),
            Kelvin::fromKelvinValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toKelvinValue
     */
    public function testToKelvinValue(): void
    {
        static::assertSame(42.0, (new Kelvin(42.0, $this->createMock(ArithmeticOperations::class)))->toKelvinValue());
    }
}
