<?php

use Jadu\Pulsar\Twig\Extension\ArrayExtension;
use Jadu\Pulsar\Twig\Extension\AttributeParserExtension;
use Jadu\Pulsar\Twig\Extension\ConfigExtension;
use Jadu\Pulsar\Twig\Extension\ConstantDefinedExtension;
use Jadu\Pulsar\Twig\Extension\GetConstantExtension;
use Jadu\Pulsar\Twig\Extension\HelperOptionsModifierExtension;
use Jadu\Pulsar\Twig\Extension\RelativeTimeExtension;
use Jadu\Pulsar\Twig\Extension\TabsExtension;
use Jadu\Pulsar\Twig\Extension\UrlParamsExtension;
use Symfony\Bridge\Twig\Extension\FormExtension;
use Symfony\Bridge\Twig\Extension\TranslationExtension;
use Symfony\Bridge\Twig\Form\TwigRenderer;
use Symfony\Bridge\Twig\Form\TwigRendererEngine;
use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Form\FormRenderer;
use Symfony\Component\Form\Forms;
use Symfony\Component\Translation\Loader\XliffFileLoader;
use Symfony\Component\Translation\Translator;
use Symfony\Component\Validator\Validation;

define('VENDOR_DIR', realpath(__DIR__ . '/../vendor'));
define('VENDOR_FORM_DIR', VENDOR_DIR . '/symfony/form');
define('VENDOR_VALIDATOR_DIR', VENDOR_DIR . '/symfony/validator');
define('VENDOR_TWIG_BRIDGE_DIR', VENDOR_DIR . '/symfony/twig-bridge');
define('VIEWS_DIR', VENDOR_DIR . '/jadu/pulsar/views');
define('FIXTURES_DIR', VENDOR_DIR . '/jadu/pulsar/tests/unit/Jadu/Pulsar/Twig/Macro/Fixtures');
define('TEST_LAYOUT_DIR', VENDOR_DIR . '/jadu/pulsar/tests/css');

// Set up the Validator component
$validator = Validation::createValidator();

// Set up the Translation component
$translator = new Translator('en');
$translator->addLoader('xlf', new XliffFileLoader());
$translator->addResource('xlf', VENDOR_FORM_DIR . '/Resources/translations/validators.en.xlf', 'en', 'validators');
$translator->addResource('xlf', VENDOR_VALIDATOR_DIR . '/Resources/translations/validators.en.xlf', 'en', 'validators');

$loader = new Twig_Loader_Filesystem(
    [
        __DIR__ . '/views',
        __DIR__ . '/../src/Resources/views',
        VIEWS_DIR,
        FIXTURES_DIR,
        TEST_LAYOUT_DIR,
        VENDOR_TWIG_BRIDGE_DIR . '/Resources/views/Form',
    ]
);

$loader->addPath(VIEWS_DIR, 'pulsar');
$loader->addPath(TEST_LAYOUT_DIR, 'cssTests');

$twig = new Twig_Environment(
    $loader,
    [
        'debug' => true,
        'strict_variables' => true,
    ]
);

$formEngine = new TwigRendererEngine(
    [
        'forms.html.twig'
    ]
);
$formEngine->setEnvironment($twig);

$twig->addExtension(new ArrayExtension());
$twig->addExtension(new AttributeParserExtension());
$twig->addExtension(new ConfigExtension(__DIR__ . '/pulsar.json'));
$twig->addExtension(new ConstantDefinedExtension());
$twig->addExtension(new HelperOptionsModifierExtension());
$twig->addExtension(new GetConstantExtension());
$twig->addExtension(new RelativeTimeExtension());
$twig->addExtension(new UrlParamsExtension($_GET));
$twig->addExtension(new TabsExtension());
$twig->addExtension(new Twig_Extension_Debug());
$twig->addExtension(new TranslationExtension($translator));
$twig->addExtension(new FormExtension(new TwigRenderer($formEngine)));

$twig->addRuntimeLoader(
    new Twig_FactoryRuntimeLoader(
        [
            FormRenderer::class => function () use ($formEngine) {
                return new FormRenderer($formEngine);
            },
        ]
    )
);

// Set up the Form component
$formFactory = Forms::createFormFactoryBuilder()
    ->addExtension(new ValidatorExtension($validator))
    ->getFormFactory();
