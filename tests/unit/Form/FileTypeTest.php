<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\FileType;

class FileTypeTest extends AbstractTypeTestCase
{
    /**
     * @group file
     */
    public function testFileFieldBasic()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                FileType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/file.html.twig');
    }

    /**
     * @group file
     */
    public function testFileFieldRequired()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                FileType::class,
                [
                    'label' => 'foo',
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/file-required.html.twig');
    }

    /**
     * @group file
     */
    public function testFileFieldHelp()
    {
        $form = $this->formFactory->createBuilder()
            ->add(
                'field',
                FileType::class,
                [
                    'label' => 'foo',
                    'required' => false,
                    'attr' => [
                        'data-help-text' => 'my help text',
                    ],
                ]
            )
            ->getForm();

        $this->compareOutput($form, 'form/file-help.html.twig');
    }
}
