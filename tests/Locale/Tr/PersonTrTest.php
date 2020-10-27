<?php

// region Attributes

test('male_first_name attribute', function () {
    $value = 🙃('tr')->person->male_first_name;

    expect($value)->toBeString();
});

test('female_first_name attribute', function () {
    $value = 🙃('tr')->person->female_first_name;

    expect($value)->toBeString();
});

test('last_name attribute', function () {
    $value = 🙃('tr')->person->last_name;

    expect(mb_ereg_match('(\w+\.? ?){3,4}', $value))->toBeTrue();
});

// endregion

// region Methods

test('initials() method with default length', function () {
    $value = 🙃('tr')->person->initials();

    expect(mb_strlen($value, 'utf-8'))->toBe(6);
});

test('initials() method with given length', function () {
    $times = random_int(2, 10);
    $value = 🙃('tr')->person->initials($times);

    expect(mb_strlen($value, 'utf-8'))->toBe($times * 2);
});

// endregion
