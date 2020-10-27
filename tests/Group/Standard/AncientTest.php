<?php

// region Attributes

test('god attribute', function () {
    $value = 🙃()->ancient->god;

    expect($value)->toMatch('/\w+/');
});

test('primordial attribute', function () {
    $value = 🙃()->ancient->primordial;

    expect($value)->toMatch('/\w+/');
});

test('titan attribute', function () {
    $value = 🙃()->ancient->titan;

    expect($value)->toMatch('/\w+/');
});

test('hero attribute', function () {
    $value = 🙃()->ancient->hero;

    expect($value)->toMatch('/\w+/');
});

// endregion
