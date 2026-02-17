<?php
declare(strict_types=1);

namespace PrinsFrank\MeasurementUnit\Tests\Unit;

use PHPUnit\Framework\TestCase;
use PrinsFrank\ArithmeticOperations\ArithmeticOperations;
use PrinsFrank\MeasurementUnit\MeasurementUnit;
use PrinsFrank\MeasurementUnit\MeasurementUnitInterface;

/**
 * @coversDefaultClass \PrinsFrank\MeasurementUnit\MeasurementUnit
 */
class MeasurementUnitTest extends TestCase
{
    /**
     * @covers ::getValue
     */
    public function testGetValue(): void
    {
        $unit = new class (42.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame(42.0, $unit->getValue());
    }

    /**
     * @covers ::getInstanceSymbol
     */
    public function testGetInstanceSymbol(): void
    {
        $unit = new class (42.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame('unit', $unit->getInstanceSymbol());

        $unitWithCustomSymbol = new class (42.0, null, 'custom') extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame('custom', $unitWithCustomSymbol->getInstanceSymbol());
    }

    /**
     * @covers ::setInstanceSymbol
     */
    public function testSetInstanceSymbol(): void
    {
        $unit = new class (42.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame($unit, $unit->setInstanceSymbol('customSymbol')); // setInstanceSymbol returns $this
        static::assertSame('customSymbol', $unit->getInstanceSymbol());
    }

    /**
     * @covers ::setSymbol
     */
    public function testSetSymbol(): void
    {
        $unitClass = new class (42.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return static::$defaultSymbol;
            }
        };

        $className      = get_class($unitClass);
        $originalSymbol = $className::getSymbol();

        static::assertSame('newSymbol', $className::setSymbol('newSymbol'));
        static::assertSame('newSymbol', $className::getSymbol());

        // Reset to original value to avoid affecting other tests
        $className::setSymbol($originalSymbol);
    }

    /**
     * @covers ::setSymbol
     * @covers ::getSymbol
     * @covers ::getInstanceSymbol
     */
    public function testSetSymbolAffectsNewInstances(): void
    {
        // Define a test measurement unit class
        $unitClass = new class (0.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return static::$defaultSymbol;
            }
        };

        $className      = get_class($unitClass);
        $originalSymbol = $className::getSymbol();

        // Change the default symbol
        $className::setSymbol('changedSymbol');

        // Verify static method returns updated symbol
        static::assertSame('changedSymbol', $className::getSymbol());

        // Create a new instance and verify it uses the updated symbol
        $newInstance = new $className(42.0);
        static::assertSame('changedSymbol', $newInstance->getInstanceSymbol());

        // Reset to original value to avoid affecting other tests
        $className::setSymbol($originalSymbol);
    }

    /**
     * @covers ::toFormat
     */
    public function testToFormat(): void
    {
        $unit = new class (42.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame('42.0 unit', $unit->toFormat());
        static::assertSame('Value: 42.0, Symbol: unit', $unit->toFormat('Value: %.1f, Symbol: %s'));
        static::assertSame('42.00', $unit->toFormat('%.2f'));
    }

    /**
     * @covers ::toHtml
     */
    public function testToHtml(): void
    {
        $unit = new class (42.0) extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame('<span class="value">42.0</span> <span class="symbol">unit</span>', $unit->toHtml());

        $customTemplate = '<div class="measurement"><strong>%1$.2f</strong><em>%2$s</em></div>';
        static::assertSame(
            '<div class="measurement"><strong>42.00</strong><em>unit</em></div>',
            $unit->toHtml($customTemplate)
        );
    }

    /**
     * @covers ::toHtml
     * @covers ::toFormat
     */
    public function testFormattingWithCustomSymbol(): void
    {
        $unit = new class (42.0, null, 'custom') extends MeasurementUnit {
            public static function getSymbol(): string
            {
                return 'unit';
            }
        };

        static::assertSame('42.0 custom', $unit->toFormat());
        static::assertSame('<span class="value">42.0</span> <span class="symbol">custom</span>', $unit->toHtml());
    }
}
