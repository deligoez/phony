<?php

// region Attributes

test('flip attribute', function () {
    $value = $this->🙃->coin->flip;

    $this->assertMatchesRegularExpression('/\w+/', $value);
});

test('name attribute', function () {
    $value = $this->🙃->coin->name;

    $this->assertMatchesRegularExpression('/\w+/', $value);
});

// endregion
