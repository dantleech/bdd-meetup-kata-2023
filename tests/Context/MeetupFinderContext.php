<?php

namespace Altovita\KataMeetupBdd\Tests\Context;

use Altovita\KataMeetupBdd\Location;
use Altovita\KataMeetupBdd\Meetup;
use Altovita\KataMeetupBdd\Meetups;
use Altovita\KataMeetupBdd\Point;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use PHPUnit\Framework\Assert;

class MeetupFinderContext implements Context
{
    private Meetups $meetups;

    /**
     * @BeforeScenario
     */
    public function initialize(): void
    {
        $this->meetups = new Meetups();
    }

    /**
     * @Given there is a meetup in London
     */
    public function thereIsAMeetupInLondon(): void
    {
        $this->meetups = $this->meetups->add(
            new Meetup(
                new Location('London', new Point(51.3, 35.514))
            )
        );
    }

    /**
     * @When I search for meetups winthin 10k of London
     */
    public function iSearchForMeetupsWinthinKOfLondon(): void
    {
        $this->meetups = $this->meetups->withinDistance(10, new Location('London', new Point(51.3, 35.514)));
    }

    /**
     * @Then I should find :expectedCount meetup(s)
     */
    public function iShouldFindMeetup(int $expectedCount): void
    {
        Assert::assertCount(1, $this->meetups);
    }

    /**
     * @Given there are 2 meetups in London and one in Berlin
     */
    public function thereAreMeetupsInLondonAndOneInBerlin(): void
    {
        $this->meetups = $this->meetups->add(
            new Meetup(
                new Location('London', new Point(51.3, 35.514))
            )
        );
        $this->meetups = $this->meetups->add(
            new Meetup(
                new Location('London', new Point(51.3, 35.514))
            )
        );
        $this->meetups = $this->meetups->add(
            new Meetup(
                new Location('Berlin', new Point(21.3, 75.514))
            )
        );
    }
}
