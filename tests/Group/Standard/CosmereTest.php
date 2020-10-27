<?php

// region Attributes

test('aon attribute', function () {
    $value = 🙃()->cosmere->aon;

    expect($value)->toMatch('/\w+/');
});

test('shard_world attribute', function () {
    $value = 🙃()->cosmere->shard_world;

    expect($value)->toMatch('/\w+/');
});

test('shard attribute', function () {
    $value = 🙃()->cosmere->shard;

    expect($value)->toMatch('/\w+/');
});

test('surge attribute', function () {
    $value = 🙃()->cosmere->surge;

    expect($value)->toMatch('/\w+/');
});

test('knight_radiant attribute', function () {
    $value = 🙃()->cosmere->knight_radiant;

    expect($value)->toMatch('/\w+/');
});

test('metal attribute', function () {
    $value = 🙃()->cosmere->metal;

    expect($value)->toMatch('/\w+/');
});

test('allomancer attribute', function () {
    $value = 🙃()->cosmere->allomancer;

    expect($value)->toMatch('/\w+/');
});

test('feruchemist attribute', function () {
    $value = 🙃()->cosmere->feruchemist;

    expect($value)->toMatch('/\w+/');
});

test('herald attribute', function () {
    $value = 🙃()->cosmere->herald;

    expect($value)->toMatch('/\w+/');
});

test('spren attribute', function () {
    $value = 🙃()->cosmere->spren;

    expect($value)->toMatch('/\w+/');
});

// endregion
