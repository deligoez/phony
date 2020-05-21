<?php

beforeEach(function () {
    $this->regex = '/^:([\w-]+):$/';
});

// region Attributes

test('people attribute', function () {
    $value = $this->🙃->slack_emoji->people;

    $this->assertMatchesRegularExpression($this->regex, $value);
});

test('nature attribute', function () {
    $value = $this->🙃->slack_emoji->nature;

    $this->assertMatchesRegularExpression($this->regex, $value);
});

test('food_and_drink attribute', function () {
    $value = $this->🙃->slack_emoji->food_and_drink;

    $this->assertMatchesRegularExpression($this->regex, $value);
});

test('celebration attribute', function () {
    $value = $this->🙃->slack_emoji->celebration;

    $this->assertMatchesRegularExpression($this->regex, $value);
});

test('activity attribute', function () {
    $value = $this->🙃->slack_emoji->activity;

    $this->assertMatchesRegularExpression($this->regex, $value);
});

test('travel_and_place attribute', function () {
    $value = $this->🙃->slack_emoji->travel_and_place;

    $this->assertMatchesRegularExpression($this->regex, $value);
});

test('object_and_symbol attribute', function () {
    $value = $this->🙃->slack_emoji->object_and_symbol;

    $this->assertMatchesRegularExpression($this->regex, $value);
});

test('custom attribute', function () {
    $value = $this->🙃->slack_emoji->custom;

    $this->assertMatchesRegularExpression($this->regex, $value);
});

test('emoji attribute', function () {
    $value = $this->🙃->slack_emoji->emoji;

    $this->assertMatchesRegularExpression($this->regex, $value);
});

// endregion
