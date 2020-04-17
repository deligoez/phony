<?php

namespace Phony\Test\Phony;

use Phony\Fake\Fake;
use Phony\Test\BaseTest;
use ReflectionMethod;

class FakeOperationTest extends BaseTest
{
    protected ReflectionMethod $numerify;
    protected ReflectionMethod $letterify;
    protected ReflectionMethod $bothify;
    protected ReflectionMethod $hexify;

    protected function setUp(): void
    {
        parent::setUp();

        $this->numerify = new ReflectionMethod(Fake::class, 'numerify');
        $this->numerify->setAccessible(true);

        $this->letterify = new ReflectionMethod(Fake::class, 'letterify');
        $this->letterify->setAccessible(true);

        $this->bothify = new ReflectionMethod(Fake::class, 'bothify');
        $this->bothify->setAccessible(true);

        $this->hexify = new ReflectionMethod(Fake::class, 'hexify');
        $this->hexify->setAccessible(true);
    }

    /** @test */
    public function can_numerify_with_hash_sign(): void
    {
        $this->assertMatchesRegularExpression(
            '/^[\d]{0,3}$/',
            (int) $this->numerify->invoke(new Fake($this->🙃), '###')
        );
    }

    /** @test */
    public function can_hexify_with_hash_sign(): void
    {
        $this->assertMatchesRegularExpression(
            '/^[a-z0-9]{3}$/',
             $this->hexify->invoke(new Fake($this->🙃), '###')
        );
    }

    /** @test */
    public function can_hexify_arrays(): void
    {
        $testArray = [
            '#',
            '##',
            '###',
        ];

        $result = $this->hexify->invoke(new Fake($this->🙃), $testArray);

        foreach ($result as $item) {
            $this->assertMatchesRegularExpression(
                '/^[a-z0-9]{1,3}$/',
                 $item
            );
        }
    }

    /** @test */
    public function can_numerify_with_percentage_sign(): void
    {
        $this->assertMatchesRegularExpression(
            '/^[\d]{3}$/',
            (int) $this->numerify->invoke(new Fake($this->🙃), '%%%')
        );
    }

    /** @test */
    public function can_numerify_arrays(): void
    {
        $testArray = [
            '##',
            '%%',
            '#%',
        ];

        $result = $this->numerify->invoke(new Fake($this->🙃), $testArray);

        foreach ($result as $item) {
            $this->assertMatchesRegularExpression(
                '/^[\d]{1,2}$/',
                (int) $item
            );
        }
    }

    /** @test */
    public function can_letterify(): void
    {
        $this->assertMatchesRegularExpression(
            '/^[\w]{3}$/',
            $this->letterify->invoke(new Fake($this->🙃), '???')
        );
    }

    /** @test */
    public function can_letterify_arrays(): void
    {
        $testArray = [
            '?',
            '??',
            '???',
        ];

        $result = $this->letterify->invoke(new Fake($this->🙃), $testArray);

        foreach ($result as $item) {
            $this->assertMatchesRegularExpression(
                '/^[A-Za-z]{1,3}$/',
                $item
            );
        }
    }

    /** @test */
    public function can_bothify(): void
    {
        $this->assertMatchesRegularExpression(
            '/^[\w]{3}$/',
            $this->bothify->invoke(new Fake($this->🙃), '?#%')
        );
    }

    /** @test */
    public function can_bothify_with_asterix(): void
    {
        $this->assertMatchesRegularExpression(
            '/^[\w]{3}$/',
            $this->bothify->invoke(new Fake($this->🙃), '***')
        );
    }

    /** @test */
    public function can_bothify_arrays(): void
    {
        $testArray = [
            '#',
            '?',
            '*',
            '**',
            '#?*',
        ];

        $result = $this->bothify->invoke(new Fake($this->🙃), $testArray);

        foreach ($result as $item) {
            $this->assertMatchesRegularExpression(
                '/^[\w]{1,3}$/',
                $item
            );
        }
    }
}
