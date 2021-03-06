<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\SearchType;

class SearchTypeTest extends AbstractTypeTestCase
{
    /**
     * @group search
     */
    public function testSearchFieldBasic()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                SearchType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/search.html.twig');
    }

    /**
     * @group search
     */
    public function testSearchFieldRequired()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                SearchType::class,
                [
                    'label' => 'foo',
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/search-required.html.twig');
    }

    /**
     * @group search
     */
    public function testSearchFieldHelp()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                SearchType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-help-text' => 'my help text',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/search-help.html.twig');
    }

    /**
     * @group search
     */
    public function testSearchFieldPrependText()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                SearchType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-prepend-text' => 'bar',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/search-prepend.html.twig');
    }

    /**
     * @group search
     */
    public function testSearchFieldAppendText()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                SearchType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-append-text' => 'bar',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/search-append.html.twig');
    }

    /**
     * @group search
     */
    public function testSearchFieldPrependTextAppendText()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                SearchType::class,
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

        $this->compareOutput($form, 'form/search-prepend-append.html.twig');
    }
}
