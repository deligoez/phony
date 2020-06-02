<?php

// region Attributes

test('extension attribute', function () {
    $value = 🙃()->programming_language->php->extension;

    assertEquals(3, mb_strlen($value, 'utf8'));
});

test('hello_world attribute', function () {
    $value = 🙃()->programming_language->php->hello_world;

    $this->assertNotEmpty($value);
});

// endregion
