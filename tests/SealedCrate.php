<?php declare(strict_types=1);

namespace Tests;

class SealedCrate
{
    public function __construct(
        private string $content,
    ) {}

    protected function replace(string $with)
    {
        $this->content = $with;
    }

    private function peek(): string
    {
        return $this->content;
    }
}
