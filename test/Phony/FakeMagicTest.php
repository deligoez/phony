<?php

namespace Phony\Test\Phony;

use Phony\Test\BaseTest;
use RuntimeException;

class FakeMagicTest extends BaseTest
{
    /** @test
     *
     * @noinspection PhpUndefinedFieldInspection
     */
    public function can_not_access_undefined_magic_attribute(): void
    {
        $this->expectException(RuntimeException::class);

        $this->🙃->alphabet->not_exist;
    }

    /** @test
     *
     * @noinspection UnknownInspectionInspection
     * @noinspection Annotator
     */
    public function can_not_set_a_magic_attribute(): void
    {
        $this->expectException(RuntimeException::class);

        $this->🙃->alphabet->uppercase_letter = 'can-not';
    }

    /** @test */
    public function can_check_existence_with_magic_isset(): void
    {
        $this->assertTrue(
            isset($this->🙃->alphabet->uppercase_letter)
        );

        $this->assertFalse(
            isset($this->🙃->alphabet->not_exist)
        );
    }

    /** @test
     *
     * @noinspection PhpUndefinedMethodInspection
     */
    public function can_not_access_undefined_magic_method(): void
    {
        $this->expectException(RuntimeException::class);

        $this->🙃->alphabet->not_exist();
    }
}
