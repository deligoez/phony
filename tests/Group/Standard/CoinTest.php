<?php

// region Attributes

test('flip attribute', function () {
    $value = 🙃()->coin->flip;

    expect($value)->toMatch('/\w+/');
});

test('name attribute', function () {
    $value = 🙃()->coin->name;

    expect($value)->toMatch('/\w+/');
});

// endregion
