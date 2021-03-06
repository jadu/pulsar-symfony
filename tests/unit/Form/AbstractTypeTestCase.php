<?php

namespace Jadu\Bundle\PulsarBundle\Form;

use Jadu\Pulsar\Twig\Extension\ArrayExtension;
use Jadu\Pulsar\Twig\Extension\AttributeParserExtension;
use Jadu\Pulsar\Twig\Extension\ConfigExtension;
use Jadu\Pulsar\Twig\Extension\ConstantDefinedExtension;
use Jadu\Pulsar\Twig\Extension\HelperOptionsModifierExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormRenderer;
use Symfony\Component\Form\Forms;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig_FactoryRuntimeLoader;
use Twig_Loader_Filesystem;

abstract class AbstractTypeTestCase extends TestCase
{
    /**
     * @var Environment
     */
    protected $twig;

    /**
     * @var FormFactoryInterface
     */
    protected $formFactory;

    /**
     * @throws LoaderError
     */
    protected function setUp()
    {
        $baseDir = realpath(__DIR__ . '/../../..');

        // Set up the Translation component
        $translator = new Translator('en');
        $translator->addLoader('xlf', new XliffFileLoader());
        $translator->addResource('xlf', $baseDir . '/vendor/symfony/form/Resources/translations/validators.en.xlf', 'en', 'validators');

        $loader = new Twig_Loader_Filesystem(
            [
                __DIR__,
                $baseDir . '/vendor/jadu/pulsar/tests/unit/Jadu/Pulsar/Twig/Macro/Fixtures',
                $baseDir . '/vendor/symfony/twig-bridge/Resources/views/Form',
                $baseDir . '/vendor/jadu/pulsar/views',
            ]
        );

        $loader->addPath($baseDir . '/vendor/jadu/pulsar/views', 'pulsar');
        $loader->addPath($baseDir . '/vendor/jadu/pulsar/tests/css', 'cssTests');

        $this->twig = new Environment(
            $loader,
            [
                'cache' => false,
                'debug' => true,
                'strict_variables' => true,
            ]
        );

        $this->twig->addExtension(new ArrayExtension());
        $this->twig->addExtension(new AttributeParserExtension());
        $this->twig->addExtension(new ConfigExtension($baseDir . '/vendor/jadu/pulsar/pulsar.json'));
        $this->twig->addExtension(new ConstantDefinedExtension());
        $this->twig->addExtension(new HelperOptionsModifierExtension());
        $this->twig->addExtension(new TranslationExtension($translator));
        $this->twig->addExtension(new DebugExtension());

        $formEngine = new TwigRendererEngine([], $this->twig);

        $this->twig->addExtension(new FormExtension());

        $this->twig->addRuntimeLoader(
            new Twig_FactoryRuntimeLoader(
                [
                    FormRenderer::class => function () use ($formEngine) {
                        return new FormRenderer($formEngine);
                    },
                ]
            )
        );

        // // Set up the Form component
        $this->formFactory = Forms::createFormFactoryBuilder()->getFormFactory();
    }

    /**
     * The Twig macros will often return unpretty HTML. This method normalizes the HTML
     * rendered by Twig and in the expected output file so that they match more loosely.
     *
     * @param string $output
     *
     * @return string|null
     */
    private function normalizeOutput($output)
    {
        // Remove extra whitesapce
        $output = implode(' ', preg_split('/\s+/', trim($output)));

        // Remove extra whitespace within tags
        $output = preg_replace('/>\s+/', '>', $output);
        $output = preg_replace('/\s+</', '<', $output);

        // Normalise random ids generated and used by help text
        $output = preg_replace('/(guid-)\w+/', 'guid-1', $output);
        $output = preg_replace('/(form_)\w+(--help_text)/', 'guid-1', $output);
        $output = preg_replace('/(form_)\w+(--error_\d+)/', 'guid-1', $output);

        // Move the type attribute to the start
        $element = false;
        if (stristr($output, '<input')) {
            $element = '<input';
        } elseif (stristr($output, '<button')) {
            $element = '<button';
        }

        if ($element) {
            $inputs = explode($element, $output);

            foreach ($inputs as $i => $input) {
                $typeMatches = [];
                preg_match('/\stype=([^\s]*)/', $input, $typeMatches);
                $inputs[$i] = reset($typeMatches) . preg_replace('/\stype=([^\s]*)/', '', $input, 1);
            }

            $output = implode($element, $inputs);
        }

        // Switch around class and value when they're in the wrong order
        $output = preg_replace('/\sclass="([^"]*)"\svalue="([^"]*)"/', ' value="$2" class="$1"', $output);

        return $output;
    }

    /**
     * @param FormInterface $form
     * @param string $fixture
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function compareOutput($form, $fixture)
    {
        $expected = $this->normalizeOutput($this->twig->render($fixture));
        preg_match("/<body[^>]*>(.*?)<\/body>/is", $expected, $expectedMatches);

        $actual = $this->twig->render('symfony.html.twig', ['formTest' => $form->createView()]);
        preg_match("/<form[^>]*>(.*?)<\/form>/is", $actual, $actualMatches);

        static::assertEquals($this->normalizeOutput($expectedMatches[1]), $this->normalizeOutput($actualMatches[1]));
    }

    public function test_common()
    {
        static::assertTrue(true);
    }
}
