<?php

// region Attributes

test('uppercase_letter attribute', function () {
    $value = 🙃('tr')->alphabet->uppercase_letter;

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

test('lowercase_letter attribute', function () {
    $value = 🙃('tr')->alphabet->lowercase_letter;

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

test('letter attribute', function () {
    $value = 🙃('tr')->alphabet->letter;

    expect(mb_strlen($value, 'utf8'))->toBe(1);
});

// endregion
