<?php

namespace Phony\Fake\Standard;

use Exception;
use Phony\Fake\Fake;

/**
 * Class Number.
 */
class Number extends Fake
{
    // [x] randomInteger
    // [x] randomIntegerBetween
    // [x] randomDigit
    // [x] randomDigitNotNull
    // [x] randomDigitBetween
    // [x] randomFloat
    // [x] randomFloatBetween
    // [x] randomBoolean
    // [x] randomAsciiLetter
    // TODO: Move to Array
    // randomElement
    // randomElements
    // randomKey
    // randomKeys

    // TODO: digitWithin()
    // TODO: integerWithin() -> Boundaries are not included
    // TODO: integerBetween() -> Boundaries are included

    // TODO: integerLeadingZero($digits) -> Basinda 0 olan
    // TODO: digitNonZero
    // TODO: hexadecimal($digits)
    // TODO: normal($mean, $standard_deviation)

    // TODO: positive($from, $to) // Integer or Float
    // TODO: negative($from, $to) // Integer or Float

    // digit()
    // digitExcept
    // digitNonZero
    // digitNormal

    /**
     * Returns a random digit for the given base.
     *
     * @param  int  $base
     *
     * @return int
     */
    public function digit(int $base = 10): int
    {
        return $this->integerBetween(0, $base - 1);
    }

    /**
     * Returns a random digit for the given base except `$except`.
     *
     * @param  int  $except
     * @param  int  $base
     *
     * @return int
     */
    public function digitExcept(int $except, int $base = 10): int
    {
        $digit = $this->digit($base);

        if ($digit === 0 && $except === 0) {
            return 1;
        }

        if ($digit === $base - 1 & $except === $base - 1) {
            return $base - 2;
        }

        if ($digit === $except) {
            return $this->boolean() ? $digit++ : $digit--;
        }

        return $digit;
    }

    /**
     * Returns a random digit for the given base but not 0.
     *
     * @param  int  $base
     *
     * @return int
     */
    public function digitNonZero(int $base = 10): int
    {
        return $this->digitExcept(0, $base);
    }

    // integer
    // integerExcept
    // integerNonZero
    // integerNormal
    // integerBetween
    // integerWithin
    // integerPositive
    // integerNegative
    // integerLeadingZero

    /**
     * Returns a random integer between $min and $max.
     *
     * @param  int  $min
     * @param  int  $max
     *
     * @return int
     */
    public function integerBetween(int $min, int $max): int
    {
        try {
            return random_int($min, $max);
        } catch (Exception $e) {
            return mt_rand($min, $max);
        }
    }

    /**
     * Returns a random integer with 0 to $nbDigits digits.
     *
     * @param  int|null  $digits  Defaults to a random digit not null
     * @param  bool      $strict  Whether the returned number should have exactly $nbDigits
     *
     * @return int
     */
    public function integer(int $digits = null, bool $strict = false): int
    {
        if ($digits === null) {
            $digits = $this->digitNonZero();
        }

        $max = (10 ** $digits) - 1;

        $min = $strict
            ? 10 ** ($digits - 1)
            : 0;

        return $this->integerBetween($min, $max);
    }

    // float
    // floatExcept
    // floatNonZero
    // floatNormal
    // floatBetween
    // floatWithin
    // floatPositive
    // floatNegative
    // floatLeadingZero

    /**
     * Returns a random float between $min and $max.
     *
     * @param  float  $min
     * @param  float  $max
     *
     * @param  int    $precision
     *
     * @return float
     */
    public function floatBetween(float $min, float $max, int $precision): float
    {
        return (float) round(lcg_value() * ($max - $min) + $min, $precision);
    }

    /**
     * Returns a random float number between $min, $max and
     * with given number of maximum decimals.
     *
     * @param  int|null  $leftDigits   Defaults to a random digit not null
     * @param  int|null  $rightDigits  Maximum number of decimals
     * @param  bool      $strict       Whether the returned number should have exactly $nbDigits
     *
     * @return float
     */
    public function float(int $leftDigits = null, int $rightDigits = null, bool $strict = false): float
    {
        if ($leftDigits === null) {
            $leftDigits = $this->digitNonZero();
        }

        if ($rightDigits === null) {
            $rightDigits = $this->digit();
        }

        $max = (10 ** $leftDigits) - 1;

        $min = $strict
            ? 10 ** ($leftDigits - 1)
            : 0;

        return $this->floatBetween($min, $max, $rightDigits);
    }

    // TODO: Move to Alphabet

    /**
     * Returns a random hex letter between 0 and f.
     *
     * @return string
     */
    public function hexadecimal(): string
    {
        return dechex($this->digit(16));
    }
}
