@managing_inventory
Feature: Changing inventory is tracked by stock movement
    In order to know when, how many and by who the inventory stock has changed
    As an Administrator
    I want to see the stock movement history

    Background:
        Given the store operates on a single channel in "United States"
        And the store has a "Wyborowa Vodka" configurable product
        And the product "Wyborowa Vodka" has "Wyborowa Vodka Exquisite" variant priced at "$40.00"
        And "Wyborowa Vodka" product is tracked by the inventory
        And there are 7 units of "Wyborowa Vodka Exquisite" variant of product "Wyborowa Vodka" available in the inventory
        And I am logged in as an administrator

    @ui
    Scenario: Decreasing inventory manually
        When I want to modify the "Wyborowa Vodka Exquisite" product variant
        And I change its quantity of inventory to 10
        And I save my changes
        And I want to modify the "Wyborowa Vodka Exquisite" product variant
        Then I should see the last stock movement of +3 and current stock at 10
        And this variant should have a 10 item currently in stock

    @ui
    Scenario: Increasing inventory manually
        When I want to modify the "Wyborowa Vodka Exquisite" product variant
        And I change its quantity of inventory to 2
        And I save my changes
        And I want to modify the "Wyborowa Vodka Exquisite" product variant
        Then I should see the last stock movement of -5 and current stock at 2
        And this variant should have a 2 item currently in stock
