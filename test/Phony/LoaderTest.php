<?php

namespace Phony\Test\Phony;

use Phony\Phony;
use RuntimeException;
use PHPUnit\Framework\TestCase;

class LoaderTest extends TestCase
{
    /** @test */
    public function throws_exception_if_file_not_found(): void
    {
        $this->expectException(RuntimeException::class);

        $🙃 = new Phony('invalid-locale');

        $🙃->alphabet->uppercase_letter;
    }
}
