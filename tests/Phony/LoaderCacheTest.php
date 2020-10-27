<?php

it('can get cache size', function () {
    $value = 🙃()->getCacheSize();

    expect($value)->toBeInt();
});

it('can set cache size', function () {
    $🙃 = 🙃()->setCacheSize(1000000);

    expect($🙃->getCacheSize())->toBe(1000000);
});

it('does not cache if size exceed', function () {
    $🙃 = 🙃()->setCacheSize(0);

    $🙃->alphabet->uppercase_letter;
    $🙃->alphabet->lowercase_letter;

    expect($🙃->getCacheUsage())->toBe(0);
});

it('does not cache if it will be exceed with the number of new items', function () {
    $🙃 = 🙃()->setCacheSize(29);

    $🙃->alphabet->uppercase_letter; // Size of 29
    $🙃->alphabet->lowercase_letter; // Size of 29

    expect($🙃->getCacheUsage())->toBe(29);
});

test('cache size can be dynamically increase', function () {
    $🙃 = 🙃()->setCacheSize(0);

    $🙃->alphabet->uppercase_letter; // Size of 29

    expect($🙃->getCacheUsage())->toBe(0);

    $🙃 = 🙃()->setCacheSize(29);

    $🙃->alphabet->uppercase_letter; // Size of 29

    expect($🙃->getCacheUsage())->toBe(29);
});
