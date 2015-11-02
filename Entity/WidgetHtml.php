<?php

namespace Victoire\Widget\HtmlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\CoreBundle\Annotations as VIC;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetHtml.
 *
 * @ORM\Table("vic_widget_html")
 * @ORM\Entity
 */
class WidgetHtml extends Widget
{
    /**
     * @var content
     * @VIC\ReceiverProperty("htmlable")
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    protected $content;

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle)
     * //TODO Check the generated value and make it more consistent.
     *
     * @return string
     */
    public function __toString()
    {
        return 'Html #'.$this->id;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
