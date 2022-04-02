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

    Crowbar::pry($crate)->content = 'Lemons';

    expect($crate->peek())->toBe('Lemons');
});
