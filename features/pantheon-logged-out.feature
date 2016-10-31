Feature: Verify various Pantheon features as a logged-out user

  Scenario: Cache-Control should default to TTL=600
    When I go to "/"
    Then the response header "Cache-Control" should exist
    And the response header "Pragma" should not exist
    And the response header "Cache-Control" should be "public, max-age=600"

  Scenario: Cache-Control should have "nocache" for logged-in users
    Given I log in as an admin

    When I go to "/"
    And the response header "Pragma" should exist
    And the response header "Pragma" should contain "no-cache"
