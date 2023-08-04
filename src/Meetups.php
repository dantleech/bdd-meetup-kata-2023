<?php

namespace Altovita\KataMeetupBdd;

use Countable;

class Meetups implements Countable
{
    /**
     * @var Meetup[]
     */
    public array $meetups;

    public function __construct(Meetup ...$meetups) {
        $this->meetups = $meetups;
    }

    public function add(Meetup $meetup): Meetups
    {
        $meetups = $this->meetups;
        $meetups[] = $meetup;
        return new Meetups(...$meetups);
    }

    public function withinDistance(int $distance, Location $location): Meetups
    {
        $newMeetups = [];
        foreach ($this->meetups as $meetup) {
            $distanceInKm = acos(
                sin(deg2rad($location->point->lat)) * sin(deg2rad($meetup->location->point->lat)) + 
                cos(deg2rad($location->point->lat)) * cos(deg2rad($meetup->location->point->long)) *
                cos(deg2rad($location->point->long) - deg2rad($meetup->location->point->long))
            ) * 6371;

            if ($distanceInKm <= $distance) {
                $newMeetups[] = $meetup;
            }
        }

        return new Meetups(...$newMeetups);
    }

    public function count(): int
    {
        return count($this->meetups);
    }

}
