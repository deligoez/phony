<?php

test('it can access through magic attribute', function () {
    $value = 🙃()->alphabet;

    expect($value)->not()->toBeEmpty();
});

it('can not access undefined magic attribute', function () {
    🙃()->not_exist;
})->throws(RuntimeException::class);

it('can not set a magic attribute', function () {
    🙃()->alphabet = 'can-not';
})->throws(RuntimeException::class);

it('can check existence with magic isset', function () {
    expect(isset(🙃()->alphabet))->toBeTrue();
    expect(isset(🙃()->not_exist))->toBeFalse();
});
