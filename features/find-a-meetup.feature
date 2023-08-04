Feature: Find a meetup

    As a PHP developer
    In order to socialise
    I need to be able to find meetups within a given distance from my
    location

    Scenario: Search for meetups within 10k of London
        Given there is a meetup in London
        When I search for meetups winthin 10k of London
        Then I should find 1 meetup

