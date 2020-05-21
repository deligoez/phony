<?php

// region Attributes

test('name attribute', function () {
    $value = $this->🙃->person->name;

    $this->assertMatchesRegularExpression('/(\w+\.? ?){2,3}/', $value);
});

test('name_with_middle attribute', function () {
    $value = $this->🙃->person->name_with_middle;

    $this->assertMatchesRegularExpression('/(\w+\.? ?){3,4}/', $value);
});

test('first_name attribute', function () {
    $value = $this->🙃->person->first_name;

    $this->assertMatchesRegularExpression('/(\w+\.? ?){2,4}/', $value);
});

test('middle_name attribute', function () {
    $value = $this->🙃->person->middle_name;

    $this->assertMatchesRegularExpression('/(\w+\.? ?){3,4}/', $value);
});

test('male_first_name attribute', function () {
    $value = $this->🙃->person->male_first_name;

    $this->assertIsString($value);
});

test('female_first_name attribute', function () {
    $value = $this->🙃->person->female_first_name;

    $this->assertIsString($value);
});

test('last_name attribute', function () {
    $value = $this->🙃->person->last_name;

    $this->assertMatchesRegularExpression('/(\w+\.? ?){3,4}/', $value);
});

test('prefix attribute', function () {
    $value = $this->🙃->person->prefix;

    $this->assertMatchesRegularExpression('/[A-Z][a-z]+\.?/', $value);
});

test('suffix attribute', function () {
    $value = $this->🙃->person->suffix;

    $this->assertMatchesRegularExpression('/[A-Z][a-z]*\.?/', $value);
});

// endregion

// region Methods

test('initials() method with default length', function () {
    $value = $this->🙃->person->initials();

    $this->assertEquals(3, strlen($value));
});

test('initials() method with given length', function () {
    $value = $this->🙃->person->initials($times = random_int(2, 10));

    $this->assertEquals($times, strlen($value));
});

// endregion

// region Methods as Attributes

test('initials() method as an attribute', function () {
    $value = $this->🙃->person->initials;

    $this->assertEquals(3, strlen($value));
});

// endregion
