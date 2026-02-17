<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Speed\KilometerPerHour;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Speed\KilometerPerHour
 */
class KilometerPerHourTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('km/h', KilometerPerHour::getSymbol());
    }

    /**
     * @covers ::fromMeterPerSecondValue
     */
    public function testFromMeterPerSecondValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('divide')
            ->with(42.0, 0.277778)
            ->willReturn(151.19987904);

        static::assertEquals(
            new KilometerPerHour(151.19987904, $arithmeticOperations),
            KilometerPerHour::fromMeterPerSecondValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toMeterPerSecondValue
     */
    public function testToMeterPerSecondValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        $arithmeticOperations->expects(self::once())
            ->method('multiply')
            ->with(42.0, 0.277778)
            ->willReturn(11.666676);

        static::assertSame(11.666676, (new KilometerPerHour(42.0, $arithmeticOperations))->toMeterPerSecondValue());
    }
}
