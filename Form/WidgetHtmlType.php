<?php

namespace Victoire\Widget\HtmlBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetHtml form type.
 */
class WidgetHtmlType extends WidgetType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $mode = $options['mode'];

        if ($mode == Widget::MODE_STATIC) {
            $builder->add('content', null, [
                'label'    => 'widget_html.form.content.label',
                'required' => true,
            ]);
        }
        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\HtmlBundle\Entity\WidgetHtml',
            'widget'             => 'Html',
            'translation_domain' => 'victoire',
        ]);
    }
}
