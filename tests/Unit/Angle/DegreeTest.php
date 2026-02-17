<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit\Angle;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\Angle\Degree;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\Angle\Degree
 */
class DegreeTest extends TestCase
{
    /**
     * @covers ::getSymbol
     */
    public function testGetSymbol(): void
    {
        static::assertSame('°', Degree::getSymbol());
    }

    /**
     * @covers ::fromRadianValue
     */
    public function testFromRadianValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        static::assertEquals(
            new Degree(2406.4227395494577, $arithmeticOperations),
            Degree::fromRadianValue(42.0, $arithmeticOperations)
        );
    }

    /**
     * @covers ::toRadianValue
     */
    public function testToRadianValue(): void
    {
        /** @var ArithmeticOperations&\PHPUnit\Framework\MockObject\MockObject $arithmeticOperations */
        $arithmeticOperations = $this->createMock(ArithmeticOperations::class);
        static::assertSame(0.7330382858376184, (new Degree(42.0, $arithmeticOperations))->toRadianValue());
    }
}
