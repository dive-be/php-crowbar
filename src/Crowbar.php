<?php declare(strict_types=1);

namespace Dive\Crowbar;

use Closure;

final class Crowbar
{
    private Closure $get;

    private Closure $set;

    private function __construct(
        private object $thing,
    ) {
        $this->get = fn (string $property) => $this->{$property};
        $this->set = function (string $property, mixed $value) { $this->{$property} = $value; };
    }

    public static function pry(object $thing): self
    {
        return new self($thing);
    }

    public function __get(string $property): mixed
    {
        return $this->get->call($this->thing, $property);
    }

    public function __set(string $property, mixed $value)
    {
        $this->set->call($this->thing, $property, $value);
    }
}
