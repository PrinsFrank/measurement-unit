<picture>
  <source srcset="docs/images/banner_dark.png" media="(prefers-color-scheme: dark)">
  <img src="docs/images/banner_light.png" alt="Banner">
</picture>

# Measurement-unit

![GitHub](https://img.shields.io/github/license/prinsfrank/measurement-unit)
![PHP Version Support](https://img.shields.io/packagist/php-v/prinsfrank/measurement-unit)
[![codecov](https://codecov.io/gh/PrinsFrank/measurement-unit/branch/main/graph/badge.svg?token=9O3VB563MU)](https://codecov.io/gh/PrinsFrank/measurement-unit)

## Installation

To use this package in your project, run the following command:

```shell
composer require prinsfrank/measurement-unit
```

## Provided units

| Type        | Available unit                                                                                     |
|-------------|----------------------------------------------------------------------------------------------------|
| Length      | Fathom, Foot, Furlong, HorseLength, Inch, Meter, NauticalMile, StatuteMile, SurveyMile, Thou, Yard |
| Speed       | KilometerPerHour, MeterPerSecond, MilesPerHour                                                     |
| Temperature | Celsius, Fahrenheit, Kelvin, Rankine                                                               |
| Time        | Day, Hour, Minute, Second                                                                          |
| Torque      | NewtonMeter                                                                                        |
| Volume      | CubicInch, CubicMeter, CubicYard, FluidDram, FluidOunce, Liter, Pint, Quart, TableSpoon            |
| Weight      | Kilogram, MetricTon, Pound                                                                         |

All the units of a type can be converted to each other with corresponding methods.
