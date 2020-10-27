<?php

it('can fetch a value', function () {
    $value = callPrivateFakeMethod('fetch', 'standard.alphabet.uppercase_letter');

    expect($value)->not()->toBeNull();
});

it('can fetch many values', function () {
    $times = random_int(2, 10);
    $value = callPrivateFakeMethod('fetchMany', $times, false, '', static function () {
        return 'value';
    });

    expect($value)->toHaveCount($times);
});

it('can fetch many values as a string', function () {
    $times = random_int(2, 10);
    $value = callPrivateFakeMethod('fetchMany', $times, true, ' ', static function () {
        return 'value';
    });

    expect(substr_count($value, ' '))->toBe($times - 1);
});

it('can fetch many values as glued string', function () {
    $times = random_int(2, 10);
    $value = callPrivateFakeMethod('fetchMany', $times, true, '🙃', static function () {
        return 'value';
    });

    expect(substr_count($value, '🙃'))->toBe($times - 1);
});
