<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Jadu\Pulsar\Form\Type\ToggleSwitchType;

class ToggleSwitchTypeTest extends AbstractTypeTestCase
{
    /**
     * @group toggle_switch
     */
    public function testToggleFieldBasic()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                ToggleSwitchType::class,
                [
                    'label' => 'Toggle',
                    'required' => false,
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/toggle_switch.html.twig');
    }

    public function testCheckboxFieldHelp()
    {
        static::markTestSkipped('Bug with expected result not setting up correct aria-describedby');

        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                ToggleSwitchType::class,
                [
                    'label' => 'Toggle',
                    'required' => false,
                    'attr' => [
                        'data-help-text' => 'my help text',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/toggle_switch-help.html.twig');
    }
}
