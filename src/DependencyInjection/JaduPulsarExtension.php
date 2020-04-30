<?php

namespace Jadu\Bundle\PulsarBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class JaduPulsarExtension extends Extension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $twigFilesystemLoaderDefinition = $container->getDefinition('twig.loader.native_filesystem');
        $twigFilesystemLoaderDefinition->addMethodCall(
            'addPath',
            [
                $container->getParameter('kernel.project_dir') . '/vendor/jadu/pulsar/views/pulsar',
                'JaduPulsar',
            ]
        );
    }
}
