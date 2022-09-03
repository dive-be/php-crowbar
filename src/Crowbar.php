<?php declare(strict_types=1);

namespace Dive\Crowbar;

use Closure;

final class Crowbar
{
    private readonly Closure $call;

    private readonly Closure $get;

    private readonly Closure $set;

    private readonly object $thing;

    private function __construct(object $thing)
    {
        $this->call = fn (string $name, ...$arguments) => $this->{$name}(...$arguments);
        $this->get = fn (string $property) => $this->{$property};
        $this->set = function (string $property, mixed $value) { $this->{$property} = $value; };
        $this->thing = $thing;
    }

    public static function pry(object $thing): self
    {
        return new self($thing);
    }

    public function __call(string $name, array $arguments): mixed
    {
        return $this->call->call($this->thing, $name, ...$arguments);
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
