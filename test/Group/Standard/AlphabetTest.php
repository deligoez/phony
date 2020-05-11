<?php

namespace Phony\Test\Group\Standard;

use Phony\Test\BaseTest;

class AlphabetTest extends BaseTest
{
    // region Attributes

    /** @test */
    public function uppercase_letter_attribute(): void
    {
        $value = $this->🙃->alphabet->uppercase_letter;

        $this->assertEquals(1, mb_strlen($value, 'utf8'));
    }

    /** @test */
    public function lowercase_letter_attribute(): void
    {
        $value = $this->🙃->alphabet->lowercase_letter;

        $this->assertEquals(1, mb_strlen($value, 'utf8'));
    }

    /** @test */
    public function letter_attribute(): void
    {
        $value = $this->🙃->alphabet->letter;

        $this->assertEquals(1, mb_strlen($value, 'utf8'));
    }

    /** @test */
    public function punctuation_mark_attribute(): void
    {
        $value = $this->🙃->alphabet->punctuation_mark;

        $this->assertEquals(1, mb_strlen($value, 'utf8'));
    }

    // endregion

    // region Methods

    /** @test */
    public function ascii_uppercase_letter_method(): void
    {
        $value = $this->🙃->alphabet->ascii_uppercase_letter();

        $this->assertEquals(1, mb_strlen($value, 'utf8'));
    }

    /** @test */
    public function ascii_lowercase_letter_method(): void
    {
        $value = $this->🙃->alphabet->ascii_lowercase_letter();

        $this->assertEquals(1, mb_strlen($value, 'utf8'));
    }

    /** @test */
    public function ascii_letter_method(): void
    {
        $value = $this->🙃->alphabet->ascii_letter();

        $this->assertEquals(1, mb_strlen($value, 'utf8'));
    }

    // endregion

    // region Methods as Attributes

    /** @test */
    public function ascii_uppercase_letter_method_as_attribute(): void
    {
        $value = $this->🙃->alphabet->ascii_uppercase_letter;

        $this->assertEquals(1, mb_strlen($value, 'utf8'));
    }

    /** @test */
    public function ascii_lowercase_letter_method_as_attribute(): void
    {
        $value = $this->🙃->alphabet->ascii_lowercase_letter;

        $this->assertEquals(1, mb_strlen($value, 'utf8'));
    }

    /** @test */
    public function ascii_letter_method_as_attribute(): void
    {
        $value = $this->🙃->alphabet->ascii_letter;

        $this->assertEquals(1, mb_strlen($value, 'utf8'));
    }

    // endregion
}
