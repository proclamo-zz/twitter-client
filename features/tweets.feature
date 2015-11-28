Feature: Get last 10 tweets of a user
  In order to view the last 10 tweets of a given twitter's user
  As anonymous user
  I need to ask to the API with proper username

Scenario: Ask for tweets with no user returns an error message
  Given I request "/tweets"
  Then the response should be JSON
  And the response status code should be 400
  
#Scenario: Ask for an inexistent user return a not found message
#  Given I request "/tweets/this-user-is-sure-that-not-exists"
#  Then the response should be JSON
#  And the response status code should be 404  

#Scenario: Ask for a existent user returns the 10 last tweets
#  Given I request "/tweets/proclamo"
#  Then the response should be JSON
#  And the response status code should be 200
#  And I get 10 messages

#Scenario: Ask for a existent user and 12 tweets returns the 12 last tweets
#  Given I request "/tweets/proclamo?limit=12"
#  Then the response should be JSON
#  And the response status code should be 200
#  And I get 12 messages

#Scenario: Ask for more tweets than the MAX_TWEETS returns MAX_TWEETS tweets
#  Given I request "/twets/proclamo?limit=100"
#  Then the response should be JSON
#  And the response status code should be 200
#  And I get MAX_TWEETS messages
  