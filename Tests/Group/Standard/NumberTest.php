<?php

// region integerBetween()

test('integerBetween() method returns an integer value', function () {
    $value = $this->🙃->number->integerBetween();

    $this->assertIsInt($value);
});

test('integerBetween() method returns an integer between $min and $max', function () {
    $value = $this->🙃->number->integerBetween(1, 100);

    $this->assertGreaterThanOrEqual(1, $value);
    $this->assertLessThanOrEqual(100, $value);
});

test('integerBetween() method returns error if $min > $max', function () {
    $this->expectException(Error::class);

    $this->🙃->number->integerBetween(2, 1);
});

// endregion

// region integerWithin()

test('integerWithin() method returns an integer value', function () {
    $value = $this->🙃->number->integerWithin();

    $this->assertIsInt($value);
});

test('integerWithin() method returns an integer that the boundaries not included', function () {
    $value = $this->🙃->number->integerWithin(1, 100);

    $this->assertGreaterThanOrEqual(2, $value);
    $this->assertLessThanOrEqual(99, $value);
});

test('integerWithin() method returns error if $min > $max', function () {
    $this->expectException(Error::class);

    $this->🙃->number->integerWithin(2, 1);
});

test('integerWithin() method returns error if $min === $max', function () {
    $this->expectException(Error::class);

    $this->🙃->number->integerWithin(1, 1);
});

// endregion

// region integerPositive()

test('integerPositive() method returns an integer value', function () {
    $value = $this->🙃->number->integerPositive();

    $this->assertIsInt($value);
});

test('integerPositive() method returns a positive integer', function () {
    $value = $this->🙃->number->integerPositive();

    $this->assertGreaterThanOrEqual(1, $value);
});

test('integerPositive() method returns error if $min is not positive', function () {
    $this->expectException(Error::class);

    $this->🙃->number->integerPositive(-1);
});

test('integerPositive() method returns error if $min=0', function () {
    $this->expectException(Error::class);

    $this->🙃->number->integerPositive(0);
});

// endregion

// region integerNegative()

test('integerNegative() method returns an integer value', function () {
    $value = $this->🙃->number->integerNegative();

    $this->assertIsInt($value);
});

test('integerNegative() method returns a negative integer', function () {
    $value = $this->🙃->number->integerNegative();

    $this->assertLessThanOrEqual(-1, $value);
});

test('integerNegative() method returns error if $max is not negative', function () {
    $this->expectException(Error::class);

    $this->🙃->number->integerNegative(1);
});

test('integerNegative() method returns error if $max=0', function () {
    $this->expectException(Error::class);

    $this->🙃->number->integerNegative(0);
});

// endregion

// region integer()

test('integer() method returns an integer value', function () {
    $value = $this->🙃->number->integer();

    $this->assertIsInt($value);
});

test('integer() method returns an integer with the given number of $digits', function () {
    $digits = random_int(1, 15);
    $value = $this->🙃->number->integer($digits);

    $this->assertLessThanOrEqual($digits, strlen((string) abs($value)));
});

test('integer() method returns an integer with exactly the given number of $digits', function () {
    $digits = random_int(1, 15);
    $value = $this->🙃->number->integer($digits, true);

    $this->assertEquals($digits, strlen((string) abs($value)));
});

test('integer() method returns a positive or negative integers', function () {
    $value = $this->🙃->number->integer(1, true, true);
    $this->assertGreaterThan(0, $value);

    $value = $this->🙃->number->integer(1, true, false);
    $this->assertLessThan(0, $value);
});

// endregion

// region integerLeadingZero()

test('integerLeadingZero() method returns a string value', function () {
    $value = $this->🙃->number->integerLeadingZero();

    $this->assertIsString($value);
});

test('integerLeadingZero() method returns a string leading with zeros', function () {
    $value = $this->🙃->number->integerLeadingZero(10);

    $this->assertMatchesRegularExpression('/^^(0{0,10}[0-9]{0,10}){1}$/', $value);
});

// endregion

// region integerNormal()

test('integerNormal() method returns an integer value', function () {
    $value = $this->🙃->number->integerNormal();

    $this->assertIsInt($value);
});

test('integerNormal() method calculates integers with standard deviation', function () {
    $n = 10000;

    $values = [];
    foreach (range(1, 10000) as $k => $i) {
        $values[] = $this->🙃->number->integerNormal(150, 100);
    }

    $mean = array_sum($values) / (float) $n;

    $variance = array_reduce($values, function ($variance, $item) use ($mean) {
        return $variance += ($item - $mean) ** 2;
    }, 0) / (float) ($n - 1);

    $std_dev = sqrt($variance);

    $this->assertEqualsWithDelta(150, $mean, 5);
    $this->assertEqualsWithDelta(100, $std_dev, 3);
});

// endregion

// region integerExcept()

test('integerExcept() method returns an integer value', function () {
    $value = $this->🙃->number->integerExcept();

    $this->assertIsInt($value);
});

test('integerExcept() method returns an integer except the given integer', function () {
    $value = $this->🙃->number->integerExcept(2, 1, 2);

    $this->assertEquals(1, $value);
});

test('integerExcept() method returns an integer except the given array of integers', function () {
    $value = $this->🙃->number->integerExcept([1, 2, 3, 4], 1, 5);

    $this->assertEquals(5, $value);
});

test('integerExcept() method throws a RangeException if there are not enough integers', function () {
    $this->expectException(RangeException::class);

    $this->🙃->number->integerExcept([1, 2, 3, 4, 5], 1, 5);
});

// endregion

// region digit()

test('digit() method returns an integer value', function () {
    $value = $this->🙃->number->digit();

    $this->assertIsInt($value);
});

test('digit() method returns a digit', function () {
    $value = $this->🙃->number->digit();

    $this->assertGreaterThanOrEqual(0, $value);
    $this->assertLessThanOrEqual(9, $value);
});

test('digit() method returns a digit for the given $base', function () {
    $valueBase2 = $this->🙃->number->digit(2);

    $this->assertGreaterThanOrEqual(0, $valueBase2);
    $this->assertLessThan(2, $valueBase2);

    $base = random_int(2, 99);
    $value = $this->🙃->number->digit($base);

    $this->assertGreaterThanOrEqual(0, $value);
    $this->assertLessThan($base, $value);
});

// endregion

// region digitExcept()

test('digitExcept() method returns an integer value', function () {
    $value = $this->🙃->number->digitExcept();

    $this->assertIsInt($value);
});

test('digitExcept() method returns a digit except given digit', function () {
    $value = $this->🙃->number->digitExcept(1, 2);
    $this->assertNotEquals(1, $value);

    $value = $this->🙃->number->digitExcept(0, 2);
    $this->assertNotEquals(0, $value);

    $value = $this->🙃->number->digitExcept(1, 2);
    $this->assertNotEquals(1, $value);
});

// endregion

// region digitNonZero()

test('digitNonZero() method returns an integer value', function () {
    $value = $this->🙃->number->digitNonZero();

    $this->assertIsInt($value);
});

test('digitNonZero() method returns a digit that is not zero', function () {
    $value = $this->🙃->number->digitNonZero(2);
    $this->assertEquals(1, $value);

    $value = $this->🙃->number->digitNonZero();
    $this->assertNotEquals(0, $value);
});

// endregion

// region floatBetween()

test('floatBetween() method returns a float value', function () {
    $value = $this->🙃->number->floatBetween();

    $this->assertIsFloat($value);
});

test('floatBetween() method returns a float between $min and $max', function () {
    $value = $this->🙃->number->floatBetween(0.0, 1.0);

    $this->assertGreaterThanOrEqual(0, $value);
    $this->assertLessThanOrEqual(1, $value);
});

test('floatBetween() method returns a float with given $precision', function () {
    $precision = random_int(0, 14);
    $value = $this->🙃->number->floatBetween(0.0, 1.0, $precision);

    $this->assertLessThanOrEqual($precision + 2, strlen($value));
});

// endregion

// region floatPositive()

test('floatPositive() method returns a float value', function () {
    $value = $this->🙃->number->floatPositive();

    $this->assertIsFloat($value);
});

test('floatPositive() method returns a positive float', function () {
    $value = $this->🙃->number->floatPositive();

    $this->assertGreaterThanOrEqual(0, $value);
});

test('floatPositive() method returns zero if $max=0', function () {
    $value = $this->🙃->number->floatPositive(0);

    $this->assertEquals(0, $value);
});

test('floatPositive() method returns a float with given $precision', function () {
    $precision = random_int(0, 14);
    $value = $this->🙃->number->floatPositive(1, $precision);

    $this->assertLessThanOrEqual($precision + 2, strlen($value));
});

// endregion

// region floatNegative()

test('floatNegative() method returns a float value', function () {
    $value = $this->🙃->number->floatNegative();

    $this->assertIsFloat($value);
});

test('floatNegative() method returns a negative float', function () {
    $value = $this->🙃->number->floatNegative();

    $this->assertLessThan(0, $value);
});

test('floatNegative() method returns a float with given $precision', function () {
    $precision = random_int(0, 14);
    $value = $this->🙃->number->floatNegative(-1, $precision);

    $this->assertLessThanOrEqual($precision + 3, strlen($value));
});

// endregion

// region float()

test('float() method returns a float value', function () {
    $value = $this->🙃->number->float();

    $this->assertIsFloat($value);
});

test('float() method left digit can be strictly set', function () {
    $leftDigits = random_int(1, 10);
    $value = $this->🙃->number->float($leftDigits, 0, true);

    $this->assertEquals($leftDigits, strlen($value));
});

test('float() method right digit can be strictly set', function () {
    $rightDigits = random_int(1, 14);
    $value = $this->🙃->number->float(1, $rightDigits, true);

    $this->assertLessThanOrEqual($rightDigits + 2, strlen($value));
});

// endregion

// region floatNormal()

test('floatNormal() method returns a float', function () {
    $value = $this->🙃->number->floatNormal();

    $this->assertIsFloat($value);
});

test('floatNormal() method calculates floats with standard deviation', function () {
    $n = 10000;

    $values = [];
    foreach (range(1, 10000) as $k => $i) {
        $values[] = $this->🙃->number->floatNormal(150.0, 100.0);
    }

    $mean = array_sum($values) / (float) $n;

    $variance = array_reduce($values, function ($variance, $item) use ($mean) {
        return $variance += ($item - $mean) ** 2;
    }, 0) / (float) ($n - 1);

    $std_dev = sqrt($variance);

    $this->assertEqualsWithDelta(150, $mean, 5);
    $this->assertEqualsWithDelta(100, $std_dev, 3);
});

// endregion

// region possibleIntegersCount()

test('possibleIntegersCount() method', function (int $min, int $max, int $expected) {
    $possibilities = $this->callPrivateMethod($this->🙃->number, 'possibleIntegersCount', $min, $max);

    $this->assertEquals($expected, $possibilities);
})->with([
    [1, 5, 5],
    [0, 5, 6],
    [-5, 5, 11],
    [-5, 0, 6],
    [-10, -5, 6],
    [0, 0, 1],
    [1, 1, 1],
]);

test('possibleIntegersCount() method swaps $min and $max if necessary', function () {
    $possibilities = $this->callPrivateMethod($this->🙃->number, 'possibleIntegersCount', 5, 1);

    $this->assertEquals(5, $possibilities);
});

// endregion
