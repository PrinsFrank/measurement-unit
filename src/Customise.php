<?php

declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit;

class Customise
{
    /**
     * Set the symbols for the given measurement units.
     *
     * @param array $units An associative array where the keys are unit class names and the values are the symbols to set.
     *              e.g.: ['PrinsFrank\MeasurementUnit\Length\Meter' => 'METRE', 'PrinsFrank\MeasurementUnit\Length\Fathom' => 'FATHOM']
     *
     * @throws \InvalidArgumentException If a class does not exist or is not a valid measurement unit.
     */
    public static function unitSymbols(array $units): void
    {
        foreach ($units as $unitClass => $symbolString) {
            try {
                $unitClass::setSymbol($symbolString);
            } catch (\Error $e) {
                throw new \InvalidArgumentException("Class $unitClass does not exist.");
            } catch (\TypeError $e) {
                throw new \InvalidArgumentException("Class $unitClass is not a valid measurement unit.");
            }
        }
    }
}
