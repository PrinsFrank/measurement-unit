<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Percentage;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Percentage\Percent;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Percentage\Percent
 */
class PercentTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('%', Percent::getSymbol());
    }

    /**
     * @covers ::getValue
     */
    public function testGetValue(): void
    {
        $percent = new Percent(42.0);
        static::assertSame(42.0, $percent->getValue());
    }

    /**
     * @covers ::toDecimal
     */
    public function testToDecimal(): void
    {
        $percent = new Percent(42.0);
        static::assertSame(0.42, $percent->toDecimal());
    }
    /**
     * @covers ::toCoefficient
     */
    public function testToCoefficient(): void
    {
        $percent = new Percent(42.0);
        static::assertSame(1.42, $percent->toCoefficient());
    }
}
