<?php

use SRL\Builder;

// region Attributes

test('city attribute', function () {
    $value = 🙃()->address->city;

    $rules = regex()
        ->startsWith()
        ->anyOf(fn (Builder $query) => $query->anyCharacter()->oneOf("'"))->onceOrMore()
        ->whitespace()->neverOrMore()
        ->anyOf(fn (Builder $query) => $query->anyCharacter()->oneOf("'"))->onceOrMore()
        ->mustEnd();

    assertRulesMatching($rules, $value);
});

test('city_with_state attribute', function () {
    $value = 🙃()->address->city_with_state;

    $rules = regex()
        ->startsWith()
        ->anyOf(function (SRL\Builder $query) {
            $query->anyOf(function (SRL\Builder $query) {
                $query->anyCharacter()
                      ->oneOf("'");
            })->oneOf(' ');
        })->onceOrMore()
        ->literally(', ')
        ->anyOf(function (SRL\Builder $query) {
            $query->anyOf(function (SRL\Builder $query) {
                $query->anyCharacter()
                      ->oneOf("'");
            })->oneOf(' ');
        })->onceOrMore()
          ->mustEnd();

    assertRulesMatching($rules, $value);
});

test('street_name attribute', function () {
    $value = 🙃()->address->street_name;

    $rules = regex()
        ->startsWith()
        ->anyOf(fn (Builder $query) => $query->anyCharacter()->oneOf("'"))->onceOrMore()
        ->whitespace()
        ->anyCharacter()->onceOrMore()
        ->mustEnd();

    assertRulesMatching($rules, $value);
});

test('secondary_address attribute', function () {
    $value = 🙃()->address->secondary_address;

    $rules = regex()
        ->startsWith()
        ->anyOf(fn (Builder $query) => $query->anyCharacter()->oneOf("'"))->onceOrMore()
        ->literally('.')->neverOrMore()
        ->whitespace()
        ->digit()->onceOrMore()
        ->mustEnd();

    assertRulesMatching($rules, $value);
});

test('street_address attribute', function () {
    $value = 🙃()->address->street_address;

    $rules = regex()
        ->startsWith()
        ->digit()->onceOrMore()
        ->whitespace()
        ->anyOf(fn (Builder $query) => $query->anyCharacter()->oneOf("'"))->onceOrMore()
        ->whitespace()
        ->anyCharacter()->onceOrMore()
        ->mustEnd();

    assertRulesMatching($rules, $value);
});

test('street_address_with_secondary_address attribute', function () {
    $value = 🙃()->address->street_address_with_secondary_address;

    $rules = regex()
        ->startsWith()
        ->digit()->onceOrMore()
        ->whitespace()
        ->anyOf(fn (Builder $query) => $query->anyCharacter()->oneOf("'"))->onceOrMore()
        ->whitespace()
        ->anyCharacter()->onceOrMore()
        ->whitespace()
        ->anyOf(fn (Builder $query) => $query->anyCharacter()->oneOf("'"))->onceOrMore()
        ->literally('.')->neverOrMore()
        ->whitespace()
        ->digit()->onceOrMore()
        ->mustEnd();

    assertRulesMatching($rules, $value);
});

test('building_number attribute', function () {
    $value = 🙃()->address->building_number;

    $rules = regex()
        ->startsWith()
        ->digit()->onceOrMore()
        ->mustEnd();

    assertRulesMatching($rules, $value);
});

test('community attribute', function () {
    $value = 🙃()->address->community;

    $rules = regex()
        ->startsWith()
        ->anyCharacter()->onceOrMore()
        ->whitespace()
        ->anyCharacter()->onceOrMore()
        ->mustEnd();

    assertRulesMatching($rules, $value);
});

test('mail_box attribute', function () {
    $value = 🙃()->address->mail_box;

    $rules = regex()
        ->startsWith()
        ->literally('PO Box ')
        ->digit()->onceOrMore()
        ->mustEnd();

    assertRulesMatching($rules, $value);
});

test('time_zone attribute', function () {
    $value = 🙃()->address->time_zone;

    $rules = regex()
        ->startsWith()
        ->anyCharacter()->onceOrMore()
        ->literally('/')
        ->anyCharacter()->onceOrMore()
        ->anyOf(fn (Builder $query) => $query->literally('/')->anyCharacter())->neverOrMore()
        ->mustEnd();

    assertRulesMatching($rules, $value);
});

test('street_suffix attribute', function () {
    $value = 🙃()->address->street_suffix;

    expect($value)->toMatch('/\w+/');
});

test('city_suffix attribute', function () {
    $value = 🙃()->address->city_suffix;

    expect($value)->toMatch('/\w+/');
});

test('city_prefix attribute', function () {
    $value = 🙃()->address->city_prefix;

    expect($value)->toMatch('/\w+/');
});

test('state_abbreviation attribute', function () {
    $value = 🙃()->address->state_abbreviation;

    expect($value)->toMatch('/[A-Z]{2}/');
});

test('state attribute', function () {
    $value = 🙃()->address->state;

    expect($value)->toMatch('/\w+/');
});

test('country attribute', function () {
    $value = 🙃()->address->country;

    expect($value)->toMatch('/\w+/');
});

test('country_code attribute', function () {
    $value = 🙃()->address->country_code;

    expect($value)->toMatch('/[A-Z]{2}/');
});

test('country_code_long attribute', function () {
    $value = 🙃()->address->country_code_long;

    expect($value)->toMatch('/[A-Z]{3}/');
});

test('full_address attribute', function () {
    $value = 🙃()->address->full_address;

    expect($value)->toBeString();
});

test('default_country attribute', function () {
    $value = 🙃()->address->default_country;

    expect($value)->toBeString();
});

// endregion

// region Methods

test('zip_code() method', function () {
    $value = 🙃()->address->zip_code();

    expect($value)->toMatch('/^\d+-?\d*$/');
});

test('zip_code() method with $stateAbbreviation parameter', function () {
    $value = 🙃()->address->zip_code('CO');

    expect($value)->toMatch('/^\d+-?\d*$/');
});

test('country_by_code() method', function () {
    $value = 🙃()->address->country_by_code('TR');
    expect($value)->toBe('Turkey');

    $value = 🙃()->address->country_by_code('DE');
    expect($value)->toBe('Germany');
});

test('country_by_name() method', function () {
    $value = 🙃()->address->country_by_name('united_states');

    expect($value)->toBe('US');
});

test('latitude() method returns a float within the range', function () {
    $value = 🙃()->address->latitude();

    expect($value)->toBeFloat();
    expect($value)->toBeGreaterThanOrEqual(-90);
    expect($value)->toBeLessThanOrEqual(90);
});

test('longitude() method returns a float within the range', function () {
    $value = 🙃()->address->longitude();

    expect($value)->toBeFloat();
    expect($value)->toBeGreaterThanOrEqual(-180);
    expect($value)->toBeLessThanOrEqual(180);
});

test('coordinate() method returns an array with latitude and longitude inside', function () {
    $value = 🙃()->address->coordinate();

    expect($value)->toBeArray();
    expect($value)->toHaveCount(2);

    // latitude()
    expect($value[0])->toBeFloat();
    expect($value[0])->toBeGreaterThanOrEqual(-90);
    expect($value[0])->toBeLessThanOrEqual(90);

    // longitude()
    expect($value[1])->toBeFloat();
    expect($value[1])->toBeGreaterThanOrEqual(-180);
    expect($value[1])->toBeLessThanOrEqual(180);
});

// endregion

// region Methods as Attributes

test('zip_code() method as attribute', function () {
    $value = 🙃()->address->zip_code;

    expect($value)->toMatch('/^\d+-?\d*$/');
});

test('latitude() method as attribute', function () {
    $value = 🙃()->address->latitude;

    expect($value)->toBeFloat();
    expect($value)->toBeGreaterThanOrEqual(-90);
    expect($value)->toBeLessThanOrEqual(90);
});

test('longitude() method as attribute', function () {
    $value = 🙃()->address->longitude;

    expect($value)->toBeFloat();
    expect($value)->toBeGreaterThanOrEqual(-180);
    expect($value)->toBeLessThanOrEqual(180);
});

test('coordinate() method as attribute', function () {
    $value = 🙃()->address->coordinate;

    expect($value)->toBeArray();
    expect($value)->toHaveCount(2);

    // latitude()
    expect($value[0])->toBeFloat();
    expect($value[0])->toBeGreaterThanOrEqual(-90);
    expect($value[0])->toBeLessThanOrEqual(90);

    // longitude()
    expect($value[1])->toBeFloat();
    expect($value[1])->toBeGreaterThanOrEqual(-180);
    expect($value[1])->toBeLessThanOrEqual(180);
});

// endregion

// region Method Aliases

test('zip() method alias', function () {
    $value = 🙃()->address->zip();

    expect($value)->toMatch('/^\d+-?\d*$/');
});

test('postcode() method alias', function () {
    $value = 🙃()->address->postcode();

    expect($value)->toMatch('/^\d+-?\d*$/');
});

// endregion

// region Method Aliases as Attributes

test('zip() method alias as attribute', function () {
    $value = 🙃()->address->zip;

    expect($value)->toMatch('/^\d+-?\d*$/');
});

test('postcode() method alias as attribute', function () {
    $value = 🙃()->address->postcode;

    expect($value)->toMatch('/^\d+-?\d*$/');
});

// endregion
