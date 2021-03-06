<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class TextTypeTest extends AbstractTypeTestCase
{
    /**
     * @group text
     */
    public function testTextFieldBasic()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                TextType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/text-label.html.twig');
    }

    /**
     * @group text
     */
    public function testTextFieldRequired()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                TextType::class,
                [
                    'label' => 'foo',
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/text-required.html.twig');
    }

    /**
     * @group text
     */
    public function testTextFieldHelp()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                TextType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-help-text' => 'my help text',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/text-help.html.twig');
    }

    /**
     * @group text
     */
    public function testTextFieldPrependText()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                TextType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-prepend-text' => 'bar',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/text-prepend.html.twig');
    }

    /**
     * @group text
     */
    public function testTextFieldAppendText()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                TextType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-append-text' => 'bar',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/text-append.html.twig');
    }

    /**
     * @group text
     */
    public function testTextFieldPrependTextAppendText()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                TextType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-prepend-text' => 'bar',
                        'data-append-text' => 'baz',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/text-prepend-append.html.twig');
    }
}
