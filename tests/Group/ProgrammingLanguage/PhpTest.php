<?php

// region Attributes

test('extension attribute', function () {
    $value = 🙃()->programming_language->php->extension;

    expect(mb_strlen($value, 'utf8'))->toBe(3);
});

test('hello_world attribute', function () {
    $value = 🙃()->programming_language->php->hello_world;

    expect($value)->not()->toBeEmpty();
});

// endregion
