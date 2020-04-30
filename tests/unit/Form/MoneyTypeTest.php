<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class MoneyTypeTest extends AbstractTypeTestCase
{
    /**
     * @group money
     */
    public function testMoneyFieldBasic ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', MoneyType::class, array(
                'label' => 'foo',
                'required' => false,
            ))
            ->getForm();

        $this->compareOutput($form, 'form/money.html.twig');
    }

    /**
     * @group money
     */
    public function testMoneyFieldRequired ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', MoneyType::class, array(
                'label' => 'foo'
            ))
            ->getForm();

        $this->compareOutput($form, 'form/money-required.html.twig');
    }

    /**
     * @group money
     */
    public function testMoneyFieldHelp ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', MoneyType::class, array(
                'label' => 'foo',
                'required' => false,
                'attr' => [
                    'data-help-text' => 'my help text',
                ]
            ))
            ->getForm();

        $this->compareOutput($form, 'form/money-help.html.twig');
    }

    /**
     * @group money
     */
    public function testMoneyFieldPrependText ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', MoneyType::class, array(
                'label' => 'foo',
                'required' => false,
                'attr' => [
                    'data-prepend-text' => 'bar'
                ]
            ))
            ->getForm();

        $this->compareOutput($form, 'form/money-prepend.html.twig');
    }

    /**
     * @group money
     */
    public function testMoneyFieldAppendText ()
    {
        $form = $this->formFactory->createBuilder()
            ->add('field', MoneyType::class, array(
                'label' => 'foo',
                'required' => false,
                'attr' => [
                    'data-append-text' => 'bar'
                ]
            ))
            ->getForm();

        $this->compareOutput($form, 'form/money-append.html.twig');
    }

}
