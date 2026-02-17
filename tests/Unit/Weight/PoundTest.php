<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Weight;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Weight\Pound;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Weight\Pound
 */
class PoundTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('lb', Pound::getSymbol());
    }

    /**
     * @covers ::fromKilogramValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 0.453592)
            ->willReturn(92.5942256477);

        static::assertEquals(
            new Pound(92.5942256477, $arithmeticOperations),
            Pound::fromKilogramValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toKilogramValue
     */
    public function testToMeterPerSecondValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.453592)
            ->willReturn(19.050864);

        static::assertSame(19.050864, (new Pound(42.0, $arithmeticOperations))->toKilogramValue());
    }
}
