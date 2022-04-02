<?php declare(strict_types=1);

namespace Tests;

class SealedCrate
{
    public function __construct(
        private string $content,
    ) {}

    public function peek(): string
    {
        return $this->content;
    }
}
