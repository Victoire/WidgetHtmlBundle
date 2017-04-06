@mink:selenium2 @alice(Page) @reset-schema
Feature: Manage a HTML widget

    Background:
        Given I am on homepage

    Scenario: I can create a new HTML widget
        When I switch to "layout" mode
        Then I should see "New content"
        When I select "HTML" from the "1" select of "main_content" slot
        Then I should see "Widget (HTML)"
        And I should see "1" quantum
        When I fill in "_a_static_widget_html[content]" with "<div id='widgetHtmlIncluded'>widgetHtmlIncluded</div>"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "widgetHtmlIncluded"
        And I should not see "<div id='widgetHtmlIncluded'>"
        And I should find a "div" element with "widgetHtmlIncluded" id and containing "widgetHtmlIncluded"

    Scenario: I can update a HTML widget
        Given the following WidgetMap:
            | view | action | slot         |
            | home | create | main_content |
        And the following WidgetHTML:
            | widgetMap | content                                               |
            | home      | <div id="widgetHtmlToEdit">widgetHtmlToEdit</div> |
        When I reload the page
        Then I should see "widgetHtmlToEdit"
        Then I should find a "div" element with "widgetHtmlToEdit" id and containing "widgetHtmlToEdit"
        When I switch to "edit" mode
        And I edit the "HTML" widget
        And I should see "1" quantum
        When I fill in "_a_static_widget_html[content]" with "<div id='widgetHtmlModified'>widgetHtmlModified</div>"
        And I submit the widget
        Then I should see the success message for Widget edit
        When I reload the page
        Then I should see "widgetHtmlModified"
        And I should not see "<div id='widgetHtmlModified'>"
        And I should find a "div" element with "widgetHtmlModified" id and containing "widgetHtmlModified"
