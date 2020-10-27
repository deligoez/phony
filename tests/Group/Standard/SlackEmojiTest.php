<?php

beforeEach(function () {
    $this->regex = '/^:([\w-]+):$/';
});

// region Attributes

test('people attribute', function () {
    $value = 🙃()->slack_emoji->people;

    expect($value)->toMatch($this->regex);
});

test('nature attribute', function () {
    $value = 🙃()->slack_emoji->nature;

    expect($value)->toMatch($this->regex);
});

test('food_and_drink attribute', function () {
    $value = 🙃()->slack_emoji->food_and_drink;

    expect($value)->toMatch($this->regex);
});

test('celebration attribute', function () {
    $value = 🙃()->slack_emoji->celebration;

    expect($value)->toMatch($this->regex);
});

test('activity attribute', function () {
    $value = 🙃()->slack_emoji->activity;

    expect($value)->toMatch($this->regex);
});

test('travel_and_place attribute', function () {
    $value = 🙃()->slack_emoji->travel_and_place;

    expect($value)->toMatch($this->regex);
});

test('object_and_symbol attribute', function () {
    $value = 🙃()->slack_emoji->object_and_symbol;

    expect($value)->toMatch($this->regex);
});

test('custom attribute', function () {
    $value = 🙃()->slack_emoji->custom;

    expect($value)->toMatch($this->regex);
});

test('emoji attribute', function () {
    $value = 🙃()->slack_emoji->emoji;

    expect($value)->toMatch($this->regex);
});

// endregion
