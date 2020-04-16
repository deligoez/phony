<?php

namespace Phony;

use RuntimeException;

/**
 * Class Phony.
 *
 *
 * @property \Phony\Fake\Standard\Address        address
 * @property \Phony\Fake\Standard\Address        📫
 * @property \Phony\Fake\Standard\Alphabet       alphabet
 * @property \Phony\Fake\Standard\Alphabet       🔤
 * @property \Phony\Fake\Standard\Ancient        ancient
 * @property \Phony\Fake\Standard\Ancient        📜
 * @property \Phony\Fake\Standard\Artist         artist
 * @property \Phony\Fake\Standard\Coin           coin
 * @property \Phony\Fake\Standard\Cosmere        cosmere
 * @property \Phony\Fake\Standard\Currency       currency
 * @property \Phony\Fake\Standard\Person         person
 * @property \Phony\Fake\Standard\SlackEmoji     slack_emoji
 */
class Phony
{
    public Loader $loader;
    public string $defaultLocale;
    private array $instances = [];
    private array $groups;

    /**
     * Phony constructor.
     *
     * @param string $defaultLocale
     */
    public function __construct(string $defaultLocale)
    {
        $this->loader = new Loader($defaultLocale);
        $this->defaultLocale = $defaultLocale;
        $this->groups = Group::default;
    }

    // region Magic Setup

    /**
     * Get attributes by magic.
     *
     * @param $attribute
     *
     * @return mixed
     * @throws \Exception
     */
    public function __get($attribute)
    {
        if (isset($this->groups[$attribute])) {
            if (isset($this->instances[$attribute])) {
                return $this->instances[$attribute];
            }

            $fake = $this->groups[$attribute];
            $this->instances[$attribute] = new $fake($this);

            return $this->instances[$attribute];
        }

        throw new RuntimeException("The {$attribute} fake is not found!");
    }

    /**
     * Don't allow setting magic attributes.
     *
     * @param $attribute
     * @param $value
     */
    public function __set($attribute, $value)
    {
        throw new RuntimeException('Setting fakes is not allowed!');
    }

    /**
     * Check if a magic attribute exists.
     *
     * @param $attribute
     *
     * @return bool
     */
    public function __isset($attribute)
    {
        return isset($this->groups[$attribute]);
    }

    // endregion

    // region Caching

    public function setCacheSize(int $cacheSize): Phony
    {
        $this->loader->setCacheSize($cacheSize);

        return $this;
    }

    public function getCacheSize(): int
    {
        return $this->loader->getCacheSize();
    }

    public function getCacheUsage(): int
    {
        return $this->loader->getCacheUsage();
    }

    // endregion
}
