<?php declare(strict_types=1);

namespace Tests;

use Dive\Crowbar\Crowbar;

it('can get the value of a property with a restrictive access modifier', function () {
    $crate = new SealedCrate('Rum');

    $value = Crowbar::pry($crate)->content;

    expect($value)->toBe('Rum');
});

it('can set the value of a property with a restrictive access modifier', function () {
    $crate = new SealedCrate('Bananas');
    $crate = Crowbar::pry($crate);

    $crate->content = 'Lemons';

    expect($crate->content)->toBe('Lemons');
});

it('can invoke a method with a restrictive access modifier', function () {
    $crate = new SealedCrate('Dragonfruit');
    $crate = Crowbar::pry($crate);

    $valueA = $crate->peek();

    $crate->replace('Lychee');

    $valueB = $crate->peek();

    expect($valueA)->toBe('Dragonfruit');
    expect($valueB)->toBe('Lychee');
});
