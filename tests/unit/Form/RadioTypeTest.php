<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\RadioType;

class RadioTypeTest extends AbstractTypeTestCase
{
    /**
     * @group radio
     */
    public function testRadioFieldBasic ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', RadioType::class, array(
                'label' => 'foo',
                'required' => false,
            ))
            ->getForm();

        $this->compareOutput($form, 'form/radio-label.html.twig');
    }

    public function testRadioFieldRequired ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', RadioType::class, array(
                'label' => 'foo'
            ))
            ->getForm();

        $this->compareOutput($form, 'form/radio-required.html.twig');
    }

    public function testRadioFieldHelp ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', RadioType::class, array(
                'label' => 'foo',
                'required' => false,
                'attr' => [
                    'data-help-text' => 'my help text',
                ]
            ))
            ->getForm();

        $this->compareOutput($form, 'form/radio-help.html.twig');
    }
}
