<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Speed;

use PHPUnit\Framework\TestCase;
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
}
