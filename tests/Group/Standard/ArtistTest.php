<?php

// region Attributes

test('name attribute', function () {
    $value = 🙃()->artist->name;

    expect($value)->toMatch('/\w+/');
});

// endregion
