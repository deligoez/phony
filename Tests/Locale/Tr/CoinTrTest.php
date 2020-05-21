<?php

// region Attributes

test('flip attribute', function () {
    $value = $this->🙃->coin->flip;

    $this->assertIsString($value);
});

// endregion
