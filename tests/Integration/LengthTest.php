<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Integration;

use PHPUnit\Framework\TestCase;
use PrinsFrank\MeasurementUnit\Length\Fathom;
use PrinsFrank\MeasurementUnit\Length\Foot;
use PrinsFrank\MeasurementUnit\Length\Furlong;
use PrinsFrank\MeasurementUnit\Length\HorseLength;
use PrinsFrank\MeasurementUnit\Length\Inch;
use PrinsFrank\MeasurementUnit\Length\Length;
use PrinsFrank\MeasurementUnit\Length\Meter;
use PrinsFrank\MeasurementUnit\Length\Mile;
use PrinsFrank\MeasurementUnit\Length\NauticalMile;
use PrinsFrank\MeasurementUnit\Length\StatuteMile;
use PrinsFrank\MeasurementUnit\Length\Thou;
use PrinsFrank\MeasurementUnit\Length\Yard;

/** @coversNothing */
class LengthTest extends TestCase
{
    /** @var array<class-string<Length>> */
    private const LENGTH_FQN_S = [
        Fathom::class,
        Foot::class,
        Furlong::class,
        HorseLength::class,
        Inch::class,
        Meter::class,
        Mile::class,
        NauticalMile::class,
        StatuteMile::class,
        Thou::class,
        Yard::class,
    ];

    /** @dataProvider lengthInstances */
    public function testReversibility(Length $length): void
    {
        static::assertEquals($length, $length::fromMeterValue($length->toMeterValue(), $length->arithmeticOperations));
    }

    /** @return iterable<class-string<Length>, array<Length>> */
    public function lengthInstances(): iterable
    {
        foreach (self::LENGTH_FQN_S as $lengthFQN) {
            yield $lengthFQN => [new $lengthFQN(42.0)];
        }
    }
}
