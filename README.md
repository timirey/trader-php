<p align="center">
<img src="https://raw.githubusercontent.com/timirey/trader-php/main/.github/logo-red.svg" alt="Trader PHP" width="320">
</p>

<p align="center">
<a href="https://github.com/timirey/trader-php/actions"><img src="https://github.com/timirey/trader-php/actions/workflows/tests.yml/badge.svg" alt="Tests"></a>
<a href="https://packagist.org/packages/timirey/trader-php"><img src="https://img.shields.io/packagist/v/timirey/trader-php" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/timirey/trader-php"><img src="https://img.shields.io/packagist/dt/timirey/trader-php" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/timirey/trader-php"><img src="https://img.shields.io/packagist/l/timirey/trader-php" alt="License"></a>
</p>

# Trader PHP

Trader PHP is a PHP library that serves as a user-friendly wrapper for the [Trader Extension](https://www.php.net/manual/en/book.trader.php). It provides developers with easy access to a wide range of technical analysis indicators and functions, enabling seamless integration of financial analytics into trading and finance applications.

With support for commonly used indicators like Moving Averages (SMA, EMA), Relative Strength Index (RSI), MACD, and more, this library simplifies the process of building financial tools, algorithmic trading systems, and real-time data analysis platforms.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Basic Usage](#basic-usage)
  - [Simple Moving Average (SMA)](#example-1-simple-moving-average-sma)
  - [Relative Strength Index (RSI)](#example-2-relative-strength-index-rsi)
- [Available Indicators](#available-indicators)
- [Error Handling](#error-handling)
- [License](#license)
- [Reference](#reference)

## Features

- **Easy-to-use wrapper** around PHP’s [Trader Extension](https://www.php.net/manual/en/book.trader.php).
- Support for over **30 technical analysis indicators** such as SMA, EMA, RSI, MACD, and more.
- **Real-time trading workflows** with built-in error handling.
- Ideal for building **financial applications, trading bots, and analytics tools**.

## Installation

You can easily install the library using [Composer](https://getcomposer.org/):

```bash
composer require timirey/trader-php
```

Make sure that the PHP Trader Extension is installed and enabled on your PHP setup.

## Basic Usage

Once installed, you can quickly start using the indicators in your PHP application.

### Example 1: Simple Moving Average (SMA)

```php
use Trader\TraderService;

require 'vendor/autoload.php';

// Initialize TraderService
$trader = new TraderService();

// Sample close prices (could be from a stock price feed)
$closePrices = [120.5, 121.0, 121.5, 122.0, 122.5];  // closing prices

// Calculate the Simple Moving Average (SMA) with a period of 3
$sma = $trader->sma($closePrices, 3);

// Display the result
echo "Simple Moving Average (SMA): " . implode(", ", $sma);
```

### Example 2: Relative Strength Index (RSI)

```php
use Trader\TraderService;

require 'vendor/autoload.php';

// Initialize TraderInterface
$trader = new TraderService();

// Sample close prices
$closePrices = [120.5, 121.0, 121.5, 122.0, 122.5];

// Calculate RSI with a period of 14
$rsi = $trader->rsi($closePrices, 14);

// Display the result
echo "Relative Strength Index (RSI): " . implode(", ", $rsi);
```

## Available Indicators

The library provides access to a wide variety of technical analysis functions supported by the PHP Trader extension. Some of the most commonly used indicators include:

* **SMA** - Simple Moving Average
* **EMA** - Exponential Moving Average
* **RSI** - Relative Strength Index
* **MACD** - Moving Average Convergence Divergence
* **ADX** - Average Directional Index
* **ATR** - Average True Range
* **Bollinger Bands**
* **CCI** - Commodity Channel Index
* **MFI** - Money Flow Index
* **OBV** - On-Balance Volume
* Stochastic Oscillator

For a full list of available functions, refer to the [official PHP Trader documentation](https://www.php.net/manual/en/book.trader.php).

## Error Handling

To handle errors, you can catch `BadFunctionCallException` exceptions that occur when invalid data is passed to any indicator.

## License

This library is licensed under the MIT License. See the [LICENSE](https://github.com/timirey/trader-php/blob/main/LICENSE.md) file for more information.

## Reference

For more detailed documentation, please refer to [official PHP Trader documentation](https://www.php.net/manual/en/book.trader.php).
