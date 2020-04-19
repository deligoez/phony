<?php

namespace Phony\Fake;

use Phony\Phony;

/**
 * Class Fake.
 */
class Fake
{
    protected Phony $phony;
    protected array $attributes;
    protected array $functionAttributes;
    protected array $functions;
    protected array $functionAliases;

    /**
     * Fake constructor.
     *
     * @param  \Phony\Phony  $phony
     */
    public function __construct(Phony $phony)
    {
        $this->phony = $phony;
    }

    // region Magic Setup

    /**
     * Gets a magic attribute.
     *
     * @param $attribute
     *
     * @return mixed
     * @throws \Exception
     */
    public function __get($attribute)
    {
        if (isset($this->attributes[$attribute])) {
            $value = $this->fetch($this->attributes[$attribute][0]);

            if (isset($this->attributes[$attribute][1])) {
                $functions = explode('|', $this->attributes[$attribute][1]);

                foreach ($functions as $fn) {
                    $value = $this->$fn($value);
                }
            }

            return $value;
        }

        if (isset($this->functionAliases[$attribute])) {
            return $this->{$this->functionAliases[$attribute]}();
        }

        throw new \RuntimeException("The {$attribute} attribute is not defined!");
    }

    /**
     * Setting a magic attribute is not allowed.
     *
     * @param $attribute
     * @param $value
     */
    public function __set($attribute, $value)
    {
        throw new \RuntimeException("Setting {$attribute} attribute is not allowed!");
    }

    /**
     * Checks if a magic attribute exists.
     *
     * @param $attribute
     *
     * @return bool
     */
    public function __isset($attribute)
    {
        if (isset($this->attributes[$attribute])) {
            return true;
        }

        return false;
    }

    /**
     * Gets a magic function.
     *
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (isset($this->functionAttributes[$name])) {
            return $this->{$this->functionAttributes[$name][0]}(...$this->functionAttributes[$name][1]);
        }

        throw new \RuntimeException("The {$name} function is not defined!");
    }

    // endregion

    // region Fetching

    /**
     * Fetches a value.
     *
     * @param  string       $key
     *
     * @param  string|null  $path
     *
     * @return string
     */
    protected function fetch(string $key, string $path = null): string
    {
        $template = $this->phony->loader->get($key, $path, $this->phony->defaultLocale);

        // Pick one if it's an array
        if (is_array($template)) {
            $template = $template[array_rand($template, 1)];
        }

        // Check if it's an actual fake data or a template
        if (strpos($template, '🙃') === false) {
            // It's a fake data, so return it immediately.
            return $template;
        }

        // Extract placeholders in the template
        $placeholders = [];
        preg_match_all('/🙃(.*?)🙃/u', $template, $placeholders);

        // Fetch placeholder values recursively
        $values = [];
        foreach ($placeholders[1] as $index => $placeholder) {
            $values[$placeholders[0][$index]] = $this->fetch($placeholder);
        }

        return strtr($template, $values);
    }

    /**
     * Fetches multiple values given number of times.
     *
     * @param  int     $times
     * @param  bool    $asString
     * @param  string  $glue
     * @param          $callback
     *
     * @return array|string
     */
    protected function fetchMany(int $times, bool $asString, string $glue, $callback)
    {
        $values = [];

        foreach (range(1, $times) as $i) {
            $values[] = $callback();
        }

        return $asString
            ? implode($glue, $values)
            : $values;
    }

    // endregion

    // region Random Numbers

    /**
     * Returns a random number between 0 and 9.
     *
     * @param  int  $start
     * @param  int  $end
     *
     * @return int
     */
    protected function randomDigit(int $start = 0, int $end = 9): int
    {
        try {
            return random_int($start, $end);
        } catch (\Exception $e) {
            return mt_rand($start, $end);
        }
    }

    /**
     * Returns a random number between 1 and 9.
     *
     * @return int
     */
    protected function randomDigitNotNull(): int
    {
        return $this->randomDigit(1, 9);
    }

    /**
     * Returns a random hex letter between 0 and f.
     *
     * @return string
     */
    protected function randomHexLetter(): string
    {
        return dechex($this->randomDigit(0, 15));
    }

    /**
     * Returns a random integer with 0 to $nbDigits digits.
     *
     * @param  int  $nbDigits
     *
     * @return int
     */
    protected function randomNumber(int $nbDigits = null): int
    {
        if ($nbDigits === null) {
            $nbDigits = $this->randomDigitNotNull();
        }

        $max = (10 ** $nbDigits) - 1;

        return $this->randomDigit(0, $max);
    }

    /**
     * Returns a random integer between $min and $max.
     *
     * @param  int  $min
     * @param  int  $max
     *
     * @return int
     */
    protected function numberBetween(int $min, int $max): int
    {
        return $min < $max
            ? $this->randomDigit($min, $max)
            : $this->randomDigit($max, $min);
    }

    /**
     * Returns a random float number between $min, $max and
     * with given number of maximum decimals.
     *
     * @param  int|null  $max
     * @param  int|null  $min
     * @param  int|null  $nbMaxDecimals
     *
     * @return float
     */
    public function randomFloat(int $max = null, int $min = 0, int $nbMaxDecimals = null): float
    {
        if ($nbMaxDecimals === null) {
            $nbMaxDecimals = $this->randomDigit();
        }

        if ($max === null) {
            $max = $this->randomNumber();
        }

        if ($min > $max) {
            $tmp = $min;
            $min = $max;
            $max = $tmp;
        }

        return (float) round($this->randomDigit($min, $max) + ($this->randomDigit(0, PHP_INT_MAX) / PHP_INT_MAX), $nbMaxDecimals);
    }

    // endregion

    // region Numerifications

    /**
     * Replaces every hash sign ('#') with a random digit and percentage
     * sign ('%') with a random digit that is not null.
     *
     * @param  array|string  $numberString
     *
     * @return array|string
     */
    protected function numerify($numberString = '%%%###')
    {
        if (is_array($numberString)) {
            foreach ($numberString as $index => $item) {
                $numberString[$index] = $this->numerify($item);
            }
        }

        $numberString = preg_replace_callback('/%/', fn () => $this->randomDigitNotNull(), $numberString);
        $numberString = preg_replace_callback('/#/', fn () => $this->randomDigit(), $numberString);

        return $numberString;
    }

    /**
     * Replaces every question mark ('?') with a random hex digit.
     *
     * @param  array|string  $letterString
     *
     * @return array|string
     */
    protected function hexify($letterString = '####')
    {
        if (is_array($letterString)) {
            foreach ($letterString as $index => $item) {
                $letterString[$index] = $this->hexify($item);
            }
        }

        return preg_replace_callback(
            '/#/',
            fn () => $this->randomHexLetter(),
            $letterString
        );
    }

    /**
     * Replaces every question mark ('?') with a random letter.
     *
     * @param  array|string  $letterString
     *
     * @return array|string
     */
    protected function letterify($letterString = '????')
    {
        if (is_array($letterString)) {
            foreach ($letterString as $index => $item) {
                $letterString[$index] = $this->letterify($item);
            }
        }

        return preg_replace_callback(
            '/\?/',
            fn () => $this->fetch('alphabet.letter'),
            $letterString
        );
    }

    /**
     * Replaces every hash ('#') and question sign ('?') with a random number and letter.
     * An asterisk sign ('*') is replaced by a random number or a random letter.
     *
     * @param  array|string  $string
     *
     * @return array|string
     */
    protected function bothify($string = '##??**')
    {
        if (is_array($string)) {
            foreach ($string as $index => $item) {
                $string[$index] = $this->bothify($item);
            }
        }

        $string = $this->letterify($this->numerify($string));

        $string = preg_replace_callback(
            '/\*/',
            fn () => random_int(0, 1)
                ? $this->numerify('#')
                : $this->letterify('?'),
            $string
        );

        return $string;
    }

    // endregion
}
