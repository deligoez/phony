<?php

it('can numerify with hash sign', function () {
    $value = callPrivateFakeMethod('numerify', '###');

    expect($value)->toMatch('/^[\d]{0,3}$/');
});

it('can hexify with hash sign', function () {
    $value = callPrivateFakeMethod('hexify', '###');

    expect($value)->toMatch('/^[a-z0-9]{3}$/');
});

it('can hexify arrays', function () {
    $testArray = [
        '#',
        '##',
        '###',
    ];

    $result = callPrivateFakeMethod('hexify', $testArray);

    foreach ($result as $item) {
        expect($item)->toMatch('/^[a-z0-9]{1,3}$/');
    }
});

it('can numerify with percentage sign', function () {
    $value = callPrivateFakeMethod('numerify', '%%%');

    expect($value)->toMatch('/^[\d]{3}$/');
});

it('can numerify arrays', function () {
    $testArray = [
        '##',
        '%%',
        '#%',
    ];

    $result = callPrivateFakeMethod('numerify', $testArray);

    foreach ($result as $item) {
        expect($item)->toMatch('/^[\d]{1,2}$/');
    }
});

it('can letterify', function () {
    $value = callPrivateFakeMethod('letterify', '???');

    expect($value)->toMatch('/^[\w]{3}$/');
});

it('can letterify arrays', function () {
    $testArray = [
        '?',
        '??',
        '???',
    ];

    $result = callPrivateFakeMethod('letterify', $testArray);

    foreach ($result as $item) {
        expect($item)->toMatch('/^[A-Za-z]{1,3}$/');
    }
});

it('can bothify', function () {
    $value = callPrivateFakeMethod('bothify', '?#%');

    expect($value)->toMatch('/^[\w]{3}$/');
});

it('can bothify with asterix', function () {
    $value = callPrivateFakeMethod('bothify', '***');

    expect($value)->toMatch('/^[\w]{3}$/');
});

it('can bothify arrays', function () {
    $testArray = [
        '#',
        '?',
        '*',
        '**',
        '#?*',
    ];

    $result = callPrivateFakeMethod('bothify', $testArray);

    foreach ($result as $item) {
        expect($item)->toMatch('/^[\w]{1,3}$/');
    }
});
