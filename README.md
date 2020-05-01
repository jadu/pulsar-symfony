# JaduPulsarBundle for Symfony

This bundle provides integration for [Pulsar](https://github.com/jadu/pulsar) into Symfony.

Installation
------------

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Step 1: Download the Bundle


Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require jadu/pulsar-symfony
```

### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new \Jadu\Bundle\PulsarBundle\JaduPulsarBundle(),
        ];

        // ...
    }

    // ...
}
```

Usage
-----

### Twig Helpers

Pulsar's Twig helpers are automatically registered under the `@JaduPulsar` namespace.

Information on how to use the twig helpers can be found in the [Pulsar Documentation](https://pulsar.docs.jadu.net/).

#### Example

```twig
{% import '@JaduPulsar/v2/helpers/html.html.twig' as html %}

{{
    html.panel({
        'title': 'In West Philadelphia born and raised',
        'body': 'In the playground was where I spent most of my days.',
        'icon': 'info-sign'
    })
}}
```

### Twig Extensions

Pulsar's [Twig extensions](https://github.com/jadu/pulsar/tree/develop/src/Jadu/Pulsar/Twig/Extension) are automatically registered into twig.

Some of these helpers are required in order to use the twig helpers or Symfony forms theme.

#### Example

```twig
Created {{ product.createdAt|time_ago }}
```

### Symfony Form Theme

This bundle provides the required twig in order to theme Symfony's built in form types into Pulsar.

It's recommended to setup the theme as the default:

```yaml
# app/config/config.yml

twig:
    form_themes:
        - '@JaduPulsar/forms.html.twig'
```

Once registered, generated forms using Symfony's built in form types will be styled into Pulsar.

### Additional Symfony Form Types

This bundle provides additional form types for the form components provided by Pulsar which are not built in by Symfony.

These can be found in the [`Jadu\Bundle\PulsarBundle\Form`](https://github.com/jadu/pulsar-symfony/tree/master/src/Form) namespace.

#### Example

```php
use Jadu\Bundle\PulsarBundle\Form\ToggleSwitchType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class MyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'enabled',
                ToggleSwitchType::class,
                [
                    'required' => false,
                ]
            );

        // ...
    }

    // ...
}
```
