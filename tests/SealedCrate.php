<?php declare(strict_types=1);

namespace Tests;

final class SealedCrate
{
    public function __construct(private string $content) {}

    private function replace(string $with): void
    {
        $this->content = $with;
    }

    private function peek(): string
    {
        return $this->content;
    }
}
