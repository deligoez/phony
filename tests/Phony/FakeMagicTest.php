<?php

it('can not access undefined magic attribute', function () {
    🙃()->alphabet->not_exist;
})->throws(RuntimeException::class);

it('can not set a magic attribute', function () {
    🙃()->alphabet->uppercase_letter = 'can-not';
})->throws(RuntimeException::class);

it('can check existence with magic isset', function () {
    expect(isset(🙃()->alphabet->uppercase_letter))->toBeTrue();

    expect(isset(🙃()->alphabet->not_exist))->toBeFalse();
});

it('can not access undefined magic method', function () {
    🙃()->alphabet->not_exist();
})->throws(RuntimeException::class);
