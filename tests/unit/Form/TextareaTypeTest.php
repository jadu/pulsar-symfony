<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TextareaTypeTest extends AbstractTypeTestCase
{
    public function testTextareaFieldBasic()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                TextareaType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/textarea.html.twig');
    }

    public function testTextareaFieldRequired()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                TextareaType::class,
                [
                    'label' => 'foo',
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/textarea-required.html.twig');
    }

    public function testTextareaFieldHelp()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                TextareaType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-help-text' => 'my help text',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/textarea-help.html.twig');
    }
}
