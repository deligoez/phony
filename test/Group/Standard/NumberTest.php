<?php

namespace Phony\Test\Group\Standard;

use Phony\Test\BaseTest;

class NumberTest extends BaseTest
{
    /** @test */
    public function digit_method_returns_an_integer(): void
    {
        $value = $this->🙃->number->digit();

        $this->assertIsInt($value);
    }

    /** @test */
    public function digit_method_returns_a_digit(): void
    {
        $value = $this->🙃->number->digit();

        $this->assertGreaterThanOrEqual(0, $value);
        $this->assertLessThanOrEqual(9, $value);
    }

    /** @test */
    public function digit_method_returns_a_digit_for_the_given_base(): void
    {
        $valueBase2 = $this->🙃->number->digit(2);

        $this->assertGreaterThanOrEqual(0, $valueBase2);
        $this->assertLessThan(2, $valueBase2);

        $base = random_int(2, 99);
        $value = $this->🙃->number->digit($base);

        $this->assertGreaterThanOrEqual(0, $value);
        $this->assertLessThan($base, $value);
    }

    /** @test */
    public function digitNot_method_returns_a_digit_except_given_digit(): void
    {
        $value = $this->🙃->number->digitExcept(1, 2);
        $this->assertNotEquals(1, $value);

        $value = $this->🙃->number->digitExcept(0, 2);
        $this->assertNotEquals(0, $value);

        $value = $this->🙃->number->digitExcept(1, 2);
        $this->assertNotEquals(1, $value);
    }

    /** @test */
    public function digitNonZero_method_returns_a_digit_that_is_not_zero(): void
    {
        $value = $this->🙃->number->digitNonZero(2);
        $this->assertEquals(1, $value);

        $value = $this->🙃->number->digitNonZero();
        $this->assertNotEquals(0, $value);
    }
}
