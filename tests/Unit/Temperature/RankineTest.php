<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Temperature;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Temperature\Rankine;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Temperature\Rankine
 */
class RankineTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°R', Rankine::getSymbol());
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
            ->with(42.0, 5)
            ->willReturn(8.4);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(8.4, 9)
            ->willReturn(75.6);

        static::assertEquals(
            new Rankine(75.6, $arithmeticOperations),
            Rankine::fromKelvinValue(42.0, $arithmeticOperations)
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
            ->method('multiply')
            ->with(42.0, 5)
            ->willReturn(210.0);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(210.0, 9)
            ->willReturn(23.3333333333);

        static::assertSame(23.3333333333, (new Rankine(42.0, $arithmeticOperations))->toKelvinValue());
    }
}
