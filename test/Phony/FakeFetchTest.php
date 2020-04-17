<?php

namespace Phony\Test\Phony;

use Phony\Fake\Fake;
use Phony\Test\BaseTest;
use ReflectionMethod;

class FakeFetchTest extends BaseTest
{
    protected ReflectionMethod $fetch;
    protected ReflectionMethod $fetchMany;

    protected function setUp(): void
    {
        parent::setUp();

        $this->fetch = new ReflectionMethod(Fake::class, 'fetch');
        $this->fetch->setAccessible(true);
    }

    /** @test */
    public function can_fetch_a_value(): void
    {
        $this->assertNotNull(
            $this->fetch->invoke(new Fake($this->🙃), 'alphabet.uppercase_letter')
          );
    }

    /** @test
     * @throws \Exception
     */
    public function can_fetch_many_values(): void
    {
        $this->assertCount(
            $times = random_int(2, 10),
            $this->fetchMany->invoke(new Fake($this->🙃), $times, false, '', static function () {
                return 'value';
            })
        );
    }

    /** @test
     * @throws \Exception
     */
    public function can_fetch_many_values_as_a_string(): void
    {
        $times = random_int(2, 10);
        $value = $this->fetchMany->invoke(new Fake($this->🙃), $times, true, ' ', static function () {
            return 'value';
        });

        $this->assertEquals(
            $times - 1,
            substr_count($value, ' ')
        );
    }

    /** @test
     * @throws \Exception
     */
    public function can_fetch_many_values_as_glued_string(): void
    {
        $times = random_int(2, 10);
        $value = $this->fetchMany->invoke(new Fake($this->🙃), $times, true, '🙃', static function () {
            return 'value';
        });

        $this->assertEquals(
            $times - 1,
            substr_count($value, '🙃')
        );
    }
}
