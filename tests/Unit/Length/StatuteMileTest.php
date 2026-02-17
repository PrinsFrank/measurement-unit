<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Length;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Length\SurveyMile;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Length\SurveyMile
 */
class StatuteMileTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testgetSymbol(): void
    {
        static::assertSame('mi', SurveyMile::getSymbol());
    }

    /**
     * @covers ::fromMeterValue
     */
    public function testFromMeterValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 1609.3472)
            ->willReturn(0.02609753818);

        static::assertEquals(
            new SurveyMile(0.02609753818, $arithmeticOperations),
            SurveyMile::fromMeterValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toMeterValue
     */
    public function testToMeterValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 1609.3472)
            ->willReturn(67592.5824);

        static::assertSame(67592.5824, (new SurveyMile(42.0, $arithmeticOperations))->toMeterValue());
    }
}
