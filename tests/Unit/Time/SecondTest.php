<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Time;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Time\Second;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Time\Second
 */
class SecondTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('s', Second::getSymbol());
    }

    /**
     * @covers ::toSecondValue
     */
    public function testToSecondValue(): void
    {
        static::assertSame(42.0, Second::toSecondValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }

    /**
     * @covers ::fromSecondValue
     */
    public function testFromSecondValue(): void
    {
        static::assertSame(42.0, Second::fromSecondValue(42.0, $this->createMock(ArithmeticOperations::class)));
    }
}
