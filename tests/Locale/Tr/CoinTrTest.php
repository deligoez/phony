<?php

// region Attributes

test('flip attribute', function () {
    $value = 🙃('tr')->coin->flip;

    expect($value)->toBeString();
});

// endregion
