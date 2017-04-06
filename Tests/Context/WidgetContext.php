<?php

namespace Victoire\Widget\TitleBundle\Tests\Context;

use Knp\FriendlyContexts\Context\RawMinkContext;

class WidgetContext extends RawMinkContext
{
    /**
     * @When /^I should find a "(.+)" element with "(.+)" id and containing "(.+)"$/
     */
    public function iShouldSeeAElementWithIdAndContaining($element, $id, $text)
    {
        $page = $this->getSession()->getPage();

        $title = $page->find('xpath', sprintf(
            'descendant-or-self::%s[contains(@id, "%s") and normalize-space(.) = "%s"]',
            $element,
            $id,
            $text
        ));
        if (null === $title) {
            $message = sprintf(
                '"%s" with id "%s" and text "%s" was not found.',
                $element,
                $id,
                $text
            );
            throw new \Behat\Mink\Exception\ResponseTextException($message, $this->getSession());
        }
    }
}
