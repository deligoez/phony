<?php

use Phonyland\Fake\Fake;

test('can_call_by_an_alias', function () {
    expect(🙃()->address)->toBeInstanceOf(Fake::class);
    expect(🙃()->📫)->toBeInstanceOf(Fake::class);
    expect(🙃()->alphabet)->toBeInstanceOf(Fake::class);
    expect(🙃()->🔤)->toBeInstanceOf(Fake::class);
    expect(🙃()->ancient)->toBeInstanceOf(Fake::class);
    expect(🙃()->📜)->toBeInstanceOf(Fake::class);
    expect(🙃()->person)->toBeInstanceOf(Fake::class);
    expect(🙃()->coin)->toBeInstanceOf(Fake::class);
    expect(🙃()->currency)->toBeInstanceOf(Fake::class);
});
