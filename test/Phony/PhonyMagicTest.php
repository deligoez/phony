<?php

namespace Phony\Test\Phony;

use Phony\Test\BaseTest;
use RuntimeException;

class PhonyMagicTest extends BaseTest
{
    /** @test */
    public function can_not_access_undefined_magic_attribute(): void
    {
        $this->expectException(RuntimeException::class);

        $this->🙃->not_exist;
    }

    /** @test */
    public function can_not_set_a_magic_attribute(): void
    {
        $this->expectException(RuntimeException::class);

        $this->🙃->alphabet = 'can-not';
    }

    /** @test */
    public function can_check_existence_with_magic_isset(): void
    {
        $this->assertTrue(
            isset($this->🙃->alphabet)
        );

        $this->assertFalse(
            isset($this->🙃->not_exist)
        );
    }
}
