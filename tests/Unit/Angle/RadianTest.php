<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Angle;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Angle\Radian;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Angle\Radian
 */
class RadianTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('rad', Radian::getSymbol());
    }

    /**
     * @covers ::fromRadianValue
     */
    public function testFromRadianValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);

        static::assertEquals(
            new Radian(42.0, $arithmeticOperations),
            Radian::fromRadianValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toRadianValue
     */
    public function testToRadianValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        static::assertSame(42.0, (new Radian(42.0, $arithmeticOperations))->toRadianValue());
    }
}
