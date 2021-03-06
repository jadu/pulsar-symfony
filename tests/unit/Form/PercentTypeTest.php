<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\PercentType;

class PercentTypeTest extends AbstractTypeTestCase
{
    /**
     * @group percent
     */
    public function testPercentFieldBasic()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                PercentType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/percent.html.twig');
    }

    /**
     * @group percent
     */
    public function testPercentFieldRequired()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                PercentType::class,
                [
                    'label' => 'foo',
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/percent-required.html.twig');
    }

    /**
     * @group percent
     */
    public function testPercentFieldHelp()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                PercentType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-help-text' => 'my help text',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/percent-help.html.twig');
    }

    /**
     * @group percent
     */
    public function testPercentFieldPrependText()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                PercentType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-prepend-text' => 'bar',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/percent-prepend.html.twig');
    }
}
