<?php

namespace Altovita\KataMeetupBdd;

class Location
{
    public function __construct(public string $location, public Point $point)
    {
    }
}
