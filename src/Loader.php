<?php

namespace Phony;

use RuntimeException;

class Loader
{
    private string $defaultLocale;
    private array $cache = [];
    private int $cacheSize = 100000;

    public function __construct(string $defaultLocale)
    {
        $this->defaultLocale = $defaultLocale;
    }

    // region Getters & Setters

    public function getCacheSize(): int
    {
        return $this->cacheSize;
    }

    public function setCacheSize(int $cacheSize): void
    {
        $this->cacheSize = $cacheSize;
    }

    public function getCacheUsage(): int
    {
        return count($this->cache, COUNT_RECURSIVE);
    }

    // endregion

    public function get(string $key, ?string $path, string $locale = null, bool $fallback = true)
    {
        if ($fallback) {
            $locale = $locale ?? $this->defaultLocale;
        }

        [$group, $item] = explode('.', $key);

        $line = $this->load($group, $item, $locale);

        if (isset($path)) {
            // TODO: Implement nested paths
            $line = $line[$path];
        }

        return $line ?? $key;
    }

    private function load(string $group, string $item, string $locale)
    {
        if ($this->isCached($group, $item)) {
            return $this->cache[$group][$item];
        }

        $path = __DIR__."/Locale/{$locale}/{$group}/{$item}.php";

        if (file_exists($path)) {
            $data = require $path;

            $this->cache($data, $group, $item);

            return $data;
        }

        throw new RuntimeException("File does not exist at path {$path}");
    }

    private function isCached(string $group, string $item): bool
    {
        return isset($this->cache[$group][$item]);
    }

    private function cache($data, string $group, string $item): bool
    {
        if ((count($this->cache, COUNT_RECURSIVE) + count($data, COUNT_RECURSIVE)) < $this->cacheSize) {
            $this->cache[$group][$item] = $data;

            return true;
        }

        return false;
    }
}
