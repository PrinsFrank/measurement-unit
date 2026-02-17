<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Pressure;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Pressure\StandardAtmosphere;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Pressure\StandardAtmosphere
 */
class StandardAtmosphereTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('atm', StandardAtmosphere::getSymbol());
    }

    /**
     * @covers ::fromPascalValue
     */
    public function testFromPascalValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 101325)
            ->willReturn(0.000414506);

        static::assertEquals(
            new StandardAtmosphere(0.000414506, $arithmeticOperations),
            StandardAtmosphere::fromPascalValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toPascalValue
     */
    public function testToPascalValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 101325)
            ->willReturn(4255650.0);

        static::assertSame(4255650.0, (new StandardAtmosphere(42.0, $arithmeticOperations))->toPascalValue());
    }
}
