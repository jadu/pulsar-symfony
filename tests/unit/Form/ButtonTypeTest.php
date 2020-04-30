<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ButtonType;

class ButtonTypeTest extends AbstractTypeTestCase
{
    /**
     * @group button
     */
    public function testButtonFieldBasic()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                ButtonType::class,
                [
                    'label' => 'foo',
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'html/button-symfony.html.twig');
    }
}
