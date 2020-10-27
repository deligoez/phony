<?php

// region Attributes

test('name attribute', function () {
    $value = 🙃()->currency->name;

    expect($value)->toMatch('/\w+/');
});

test('code attribute', function () {
    $value = 🙃()->currency->code;

    expect($value)->toMatch('/[A-Z]{3}/');
});

test('symbol attribute', function () {
    $value = 🙃()->currency->symbol;

    expect($value)->toBeString();
});

// endregion
