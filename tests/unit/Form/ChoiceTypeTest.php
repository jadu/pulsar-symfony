<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

include_once 'AbstractTypeTestCase.php';

class ChoiceTypeTest extends AbstractTypeTestCase
{
    /**
     * @group choice
     */
    public function testChoiceFieldRadiosBasic ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', ChoiceType::class, array(
                'label' => 'foo',
                'required' => false,
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices'  => [
                    'Foo' => null,
                    'Bar' => true,
                    'Baz' => 'false',
                ]
            ))
            ->getForm();

        $this->compareOutput($form, 'form/choice.html.twig');
    }

    /**
     * @group choice
     */
    public function testChoiceFieldCheckboxBasic ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', ChoiceType::class, array(
                'label' => 'foo',
                'required' => false,
                'expanded' => true,
                'multiple' => true,
                'placeholder' => false,
                'choices'  => [
                    'Foo' => null,
                    'Bar' => true,
                    'Baz' => 'false',
                ]
            ))
            ->getForm();

        $this->compareOutput($form, 'form/choice-checkbox.html.twig');
    }

    /**
     * @group choice
     */
    public function testChoiceFieldSelectBasic ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', ChoiceType::class, array(
                'label' => 'foo',
                'required' => false,
                'expanded' => false,
                'multiple' => false,
                'placeholder' => false,
                'choices'  => [
                    'Foo' => null,
                    'Bar' => true,
                    'Baz' => 'false',
                ],
                'attr' => ['class' => 'js-select2']
            ))
            ->getForm();

        $this->compareOutput($form, 'form/choice-select.html.twig');
    }

    /**
     * @group choice
     */
    public function testChoiceFieldRadiosRequired ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', ChoiceType::class, array(
                'label' => 'foo',
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices'  => [
                    'Foo' => null,
                    'Bar' => true,
                    'Baz' => 'false',
                ]
            ))
            ->getForm();

        $this->compareOutput($form, 'form/choice-required.html.twig');
    }

    /**
     * @group choice
     */
    public function testChoiceFieldRadiosHelp ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', ChoiceType::class, array(
                'label' => 'foo',
                'required' => false,
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices'  => [
                    'Foo' => null,
                    'Bar' => true,
                    'Baz' => 'false',
                ],
                'attr' => [
                    'data-help-text' => 'my help text',
                ]
            ))
            ->getForm();

        $this->compareOutput($form, 'form/choice-help.html.twig');
    }

    /**
     * @group choice
     */
    public function testChoiceFieldCheckboxHelp ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', ChoiceType::class, array(
                'label' => 'foo',
                'required' => false,
                'expanded' => true,
                'multiple' => true,
                'placeholder' => false,
                'choices'  => [
                    'Foo' => null,
                    'Bar' => true,
                    'Baz' => 'false',
                ],
                'attr' => [
                    'data-help-text' => 'my help text',
                ]
            ))
            ->getForm();

        $this->compareOutput($form, 'form/choice-checkbox-help.html.twig');
    }
}
