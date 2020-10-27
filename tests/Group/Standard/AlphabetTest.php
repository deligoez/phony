<?php

// region Attributes

test('uppercase_letter attribute', function () {
    $value = 🙃()->alphabet->uppercase_letter;

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

test('lowercase_letter attribute', function () {
    $value = 🙃()->alphabet->lowercase_letter;

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

test('letter attribute', function () {
    foreach (range(1, 10) as $index) {
        $value = 🙃()->alphabet->letter;

        expect(mb_strlen($value, 'utf8'))->toBe(1);
    }
});

test('punctuation_mark attribute', function () {
    $value = 🙃()->alphabet->punctuation_mark;

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

// endregion

// region Methods

test('ascii_uppercase_letter() method', function () {
    $value = 🙃()->alphabet->ascii_uppercase_letter();

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

test('ascii_lowercase_letter() method', function () {
    $value = 🙃()->alphabet->ascii_lowercase_letter();

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

test('ascii_letter() method', function () {
    $value = 🙃()->alphabet->ascii_letter();

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

// endregion

// region Methods as Attributes

test('ascii_uppercase_letter() method as attribute', function () {
    $value = 🙃()->alphabet->ascii_uppercase_letter;

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

test('ascii_lowercase_letter() method as attribute', function () {
    $value = 🙃()->alphabet->ascii_lowercase_letter;

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

test('ascii_letter() method as attribute', function () {
    $value = 🙃()->alphabet->ascii_letter;

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

// endregion
