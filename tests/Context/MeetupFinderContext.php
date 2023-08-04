<?php

namespace Altovita\KataMeetupBdd\Tests\Context;

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;

class MeetupFinderContext implements Context
{

    /**
     * @Given there is a meetup in London
     */
    public function thereIsAMeetupInLondon(): void
    {
        throw new PendingException();
    }

    /**
     * @When I search for meetups winthin 10k of London
     */
    public function iSearchForMeetupsWinthinKOfLondon(): void
    {
        throw new PendingException();
    }

    /**
     * @Then I should find :arg1 meetup
     */
    public function iShouldFindMeetup($arg1): void
    {
        throw new PendingException();
    }
}
