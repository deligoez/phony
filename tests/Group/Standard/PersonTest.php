<?php

// region Attributes

test('name attribute', function () {
    $value = 🙃()->person->name;

    expect($value)->toMatch('/(\w+\.? ?){2,3}/');
});

test('name_with_middle attribute', function () {
    $value = 🙃()->person->name_with_middle;

    expect($value)->toMatch('/(\w+\.? ?){3,4}/');
});

test('first_name attribute', function () {
    $value = 🙃()->person->first_name;

    expect($value)->toMatch('/(\w+\.? ?){2,4}/');
});

test('middle_name attribute', function () {
    $value = 🙃()->person->middle_name;

    expect($value)->toMatch('/(\w+\.? ?){3,4}/');
});

test('male_first_name attribute', function () {
    $value = 🙃()->person->male_first_name;

    expect($value)->toBeString();
});

test('female_first_name attribute', function () {
    $value = 🙃()->person->female_first_name;

    expect($value)->toBeString();
});

test('last_name attribute', function () {
    $value = 🙃()->person->last_name;

    expect($value)->toMatch('/(\w+\.? ?){3,4}/');
});

test('prefix attribute', function () {
    $value = 🙃()->person->prefix;

    expect($value)->toMatch('/[A-Z][a-z]+\.?/');
});

test('suffix attribute', function () {
    $value = 🙃()->person->suffix;

    expect($value)->toMatch('/[A-Z][a-z]*\.?/');
});

// endregion

// region Methods

test('initials() method with default length', function () {
    $value = 🙃()->person->initials();

    expect(strlen($value))->toBe(3);
});

test('initials() method with given length', function () {
    $value = 🙃()->person->initials($times = random_int(2, 10));

    expect(strlen($value))->toBe($times);
});

// endregion

// region Methods as Attributes

test('initials() method as an attribute', function () {
    $value = 🙃()->person->initials;

    expect(strlen($value))->toBe(3);
});

// endregion
