<?php

// region Attributes

test('boolean attribute', function () {
    $value = 🙃()->boolean->boolean;

    expect($value)->toBeBool();
});

// endregion

// region Methods

test('boolean() method returns a boolean value', function () {
    $value = 🙃()->boolean->boolean();

    expect($value)->toBeBool();
});

test('boolean() method with $truePercentage=100 returns always true', function () {
    $value = 🙃()->boolean->boolean(100);

    expect($value)->toBeTrue();
});

test('boolean() method with $truePercentage=0 returns always false', function () {
    $value = 🙃()->boolean->boolean(0);

    expect($value)->toBeFalse();
});

// endregion
