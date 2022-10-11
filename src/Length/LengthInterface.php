<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Length;

use PrinsFrank\MeasurementUnit\MeasurementUnit;

interface LengthInterface extends MeasurementUnit
{
    public static function getSymbol(): string;

    public static function fromMeterValue(float $value): float;

    public static function toMeterValue(float $value): float;
}
