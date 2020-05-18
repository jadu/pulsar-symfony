<?php

use Jadu\Bundle\PulsarBundle\Form\ToggleSwitchType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\DateIntervalType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TimezoneType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormError;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/forms.php';

$form = $formFactory->createBuilder()
    ->add(
        'Hidden',
        HiddenType::class,
        [
            'label' => 'Hidden',
        ]
    )
    ->add(
        'Text',
        TextType::class,
        [
            'label' => 'Text',
        ]
    )
    ->add(
        'Password',
        PasswordType::class,
        [
            'label' => 'Password',
        ]
    )
    ->add(
        'Textarea',
        TextareaType::class,
        [
            'label' => 'Textarea',
        ]
    )
    ->add(
        'Email',
        EmailType::class,
        [
            'label' => 'Email',
        ]
    )
    ->add(
        'Tel',
        TelType::class,
        [
            'label' => 'Tel',
        ]
    )
    ->add(
        'Integer',
        IntegerType::class,
        [
            'label' => 'Integer',
        ]
    )
    ->add(
        'Money',
        MoneyType::class,
        [
            'label' => 'Money',
        ]
    )
    ->add(
        'Number',
        NumberType::class,
        [
            'label' => 'Number',
        ]
    )
    ->add(
        'Percent',
        PercentType::class,
        [
            'label' => 'Percent',
        ]
    )
    ->add(
        'Search',
        SearchType::class,
        [
            'label' => 'Search',
        ]
    )
    ->add(
        'Url',
        UrlType::class,
        [
            'label' => 'Url',
        ]
    )
    ->add(
        'Range',
        RangeType::class,
        [
            'label' => 'Range',
        ]
    )
    ->add(
        'Color',
        ColorType::class,
        [
            'label' => 'Color',
        ]
    )
    ->add(
        'Repeated',
        RepeatedType::class,
        [
            'label' => 'Repeated',
        ]
    )
    ->add(
        'ChoiceDefault',
        ChoiceType::class,
        [
            'label' => 'Choice (default)',
            'choices' => [
                'Maybe' => null,
                'Yes' => true,
                'No' => false,
            ],
        ]
    )
    ->add(
        'ChoiceExpanded',
        ChoiceType::class,
        [
            'label' => 'Choice (expanded)',
            'expanded' => true,
            'choices' => [
                'Maybe' => null,
                'Yes' => true,
                'No' => false,
            ],
        ]
    )
    ->add(
        'ChoiceMultiple',
        ChoiceType::class,
        [
            'label' => 'Choice (multiple)',
            'multiple' => true,
            'choices' => [
                'Maybe' => null,
                'Yes' => true,
                'No' => false,
            ],
        ]
    )
    ->add(
        'ChoiceExpandedMultiple',
        ChoiceType::class,
        [
            'label' => 'Choice (expanded multiple)',
            'expanded' => true,
            'multiple' => true,
            'choices' => [
                'Maybe' => null,
                'Yes' => true,
                'No' => false,
            ],
        ]
    )
    ->add(
        'Country',
        CountryType::class,
        [
            'label' => 'Country',
        ]
    )
    ->add(
        'Language',
        LanguageType::class,
        [
            'label' => 'Language',
        ]
    )
    ->add(
        'Locale',
        LocaleType::class,
        [
            'label' => 'Locale',
        ]
    )
    ->add(
        'Timezone',
        TimezoneType::class,
        [
            'label' => 'Timezone',
        ]
    )
    ->add(
        'Currency',
        CurrencyType::class,
        [
            'label' => 'Currency',
        ]
    )
    ->add(
        'DateChoice',
        DateType::class,
        [
            'label' => 'Date (choice)',
            'widget' => 'choice',
        ]
    )
    ->add(
        'DateText',
        DateType::class,
        [
            'label' => 'Date (text)',
            'widget' => 'text',
        ]
    )
    ->add(
        'DateSingleText',
        DateType::class,
        [
            'label' => 'Date (single text)',
            'widget' => 'single_text',
        ]
    )
    ->add(
        'DateTimeChoice',
        DateTimeType::class,
        [
            'label' => 'Date Time (choice)',
            'widget' => 'choice',
        ]
    )
    ->add(
        'DateTimeText',
        DateTimeType::class,
        [
            'label' => 'Date Time (text)',
            'widget' => 'text',
        ]
    )
    ->add(
        'DateTimeSingleText',
        DateTimeType::class,
        [
            'label' => 'Date Time (single text)',
            'widget' => 'single_text',
        ]
    )
    ->add(
        'TimeChoice',
        TimeType::class,
        [
            'label' => 'Time (choice)',
            'widget' => 'choice',
        ]
    )
    ->add(
        'TimeText',
        TimeType::class,
        [
            'label' => 'Time (text)',
            'widget' => 'text',
        ]
    )
    ->add(
        'TimeSingleText',
        TimeType::class,
        [
            'label' => 'Time (single text)',
            'widget' => 'single_text',
        ]
    )
    ->add(
        'BirthdayChoice',
        BirthdayType::class,
        [
            'label' => 'Birthday (choice)',
            'widget' => 'choice',
        ]
    )
    ->add(
        'BirthdayText',
        BirthdayType::class,
        [
            'label' => 'Birthday (text)',
            'widget' => 'text',
        ]
    )
    ->add(
        'BirthdaySingleText',
        BirthdayType::class,
        [
            'label' => 'Birthday (single text)',
            'widget' => 'single_text',
        ]
    )
    ->add(
        'DateIntervalChoice',
        DateIntervalType::class,
        [
            'label' => 'Date Interval (choice)',
            'widget' => 'choice',
        ]
    )
    ->add(
        'DateIntervalText',
        DateIntervalType::class,
        [
            'label' => 'Date Interval (text)',
            'widget' => 'text',
        ]
    )
    ->add(
        'DateIntervalInteger',
        DateIntervalType::class,
        [
            'label' => 'Date Interval (integer)',
            'widget' => 'integer',
            'with_invert' => true,
        ]
    )
    ->add(
        'DateIntervalSingleText',
        DateIntervalType::class,
        [
            'label' => 'Date Interval (single text)',
            'widget' => 'single_text',
        ]
    )
    ->add(
        'Checkbox',
        CheckboxType::class,
        [
            'label' => 'Checkbox',
        ]
    )
    ->add(
        'File',
        FileType::class,
        [
            'label' => 'File',
        ]
    )
    ->add(
        'Radio',
        RadioType::class,
        [
            'label' => 'Radio',
        ]
    )
    ->add(
        'Button',
        ButtonType::class,
        [
            'label' => 'Button',
            'attr' => ['class' => 'btn--primary'],
        ]
    )
    ->add(
        'Reset',
        ResetType::class,
        [
            'label' => 'Reset',
        ]
    )
    ->add(
        'Submit',
        SubmitType::class,
        [
            'label' => 'Submit',
        ]
    )
    ->add(
        'ToggleSwitch',
        ToggleSwitchType::class,
        [
            'label' => 'Toggle Switch',
        ]
    )
    ->getForm();

$textForm = $formFactory->createBuilder()
    ->add(
        'basic',
        TextType::class,
        [
            'label' => 'Text field',
            'required' => false,
        ]
    )
    ->add(
        'withValue',
        TextType::class,
        [
            'label' => 'Text field with value',
            'required' => false,
            'data' => 'My value',
        ]
    )
    ->add(
        'withErrors',
        TextType::class,
        [
            'label' => 'Text field with errors',
        ]
    )
    ->add(
        'required',
        TextType::class,
        [
            'label' => 'Required',
        ]
    )
    ->add(
        'placeholder',
        TextType::class,
        [
            'label' => 'Placeholder',
            'required' => false,
            'attr' => [
                'placeholder' => 'Oh, hello',
            ],
        ]
    )
    ->add(
        'helpText',
        TextType::class,
        [
            'label' => 'Text field with help (text)',
            'required' => false,
            'attr' => [
                'data-help-text' => 'Help text to give <u>more information</u> about expected input',
            ],
        ]
    )
    ->add(
        'helpHtml',
        TextType::class,
        [
            'label' => 'Text field with help (html)',
            'required' => false,
            'attr' => [
                'data-help-html' => 'Help text to give <u>more information</u> about expected input',
            ],
        ]
    )
    ->add(
        'prependAppendText',
        TextType::class,
        [
            'label' => 'Text field with prepended / appended text',
            'required' => false,
            'attr' => [
                'data-prepend-text' => 'Before',
                'data-append-text' => 'After',
            ],
        ]
    )
    ->add(
        'prependAppendIcon',
        TextType::class,
        [
            'label' => 'Text field with prepended / appended icon',
            'required' => false,
            'attr' => [
                'data-prepend-icon' => 'icon-calendar',
                'data-append-icon' => 'icon-phone',
            ],
        ]
    )
    ->add(
        'noLabel',
        TextType::class,
        [
            'label' => false,
            'required' => false,
            'attr' => [
                'data-help-text' => 'This example omits the label option entirely   ',
            ],
        ]
    )
    ->add(
        'showLabelFalse',
        TextType::class,
        [
            'label' => 'No label',
            'required' => false,
            'attr' => [
                'data-help-text' => 'This example hides the label with the show-label option',
                'data-show-label' => false,
            ],
        ]
    )
    ->add(
        'longLabel',
        TextType::class,
        [
            'label' => 'Text input with a longer than expected label which will probably wrap multple lines and push the following input onto the next baseline',
            'required' => false,
            'attr' => [
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->add(
        'formGroupTop',
        TextType::class,
        [
            'label' => 'Text input with a longer than expected label but this time we use the form__group--top class to keep the label on a single line ',
            'required' => false,
            'attr' => [
                'class' => 'form__group--top',
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->add(
        'formGroupFlush',
        TextType::class,
        [
            'label' => 'The same as above, but this time we also add the .form__group--flush class to keep everything on the left edge             ',
            'required' => false,
            'attr' => [
                'class' => 'form__group--top form__group--flush',
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->add(
        'legacyMini',
        TextType::class,
        [
            'label' => 'form__group--top form__group--flush and form__group--mini',
            'required' => false,
            'attr' => [
                'class' => 'form__group--top form__group--flush form__group--mini',
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->add(
        'legacyMini',
        TextType::class,
        [
            'label' => 'form__group--top form__group--flush and form__group--mini',
            'required' => false,
            'attr' => [
                'class' => 'form__group--top form__group--flush form__group--mini',
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->add(
        'legacySmall',
        TextType::class,
        [
            'label' => 'form__group--top form__group--flush and form__group-small',
            'required' => false,
            'attr' => [
                'class' => 'form__group--top form__group--flush form__group--small',
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->add(
        'legacyMedium',
        TextType::class,
        [
            'label' => 'form__group--top form__group--flush and form__group--medium',
            'required' => false,
            'attr' => [
                'class' => 'form__group--top form__group--flush form__group--medium',
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->add(
        'legacyDefault',
        TextType::class,
        [
            'label' => 'form__group--top form__group--flush',
            'required' => false,
            'attr' => [
                'class' => 'form__group--top form__group--flush',
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->add(
        'legacyLarge',
        TextType::class,
        [
            'label' => 'form__group--top form__group--flush and form__group--large',
            'required' => false,
            'attr' => [
                'class' => 'form__group--top form__group--flush form__group--large',
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->add(
        'legacyXLarge',
        TextType::class,
        [
            'label' => 'form__group--top form__group--flush and form__group--xlarge',
            'required' => false,
            'attr' => [
                'class' => 'form__group--top form__group--flush form__group--xlarge',
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->add(
        'legacyFull',
        TextType::class,
        [
            'label' => 'form__group--top form__group--flush and form__group--full',
            'required' => false,
            'attr' => [
                'class' => 'form__group--top form__group--flush form__group--full',
                'placeholder' => 'Placeholder',
                'data-help-text' => 'Example block-level help text here',
            ],
        ]
    )
    ->getForm();

if (isset($_POST[$form->getName()])) {
    $form->submit($_POST[$form->getName()]);

    if ($form->isValid()) {
        var_dump('VALID', $form->getData());
        die;
    }
}

$textForm->get('withErrors')->addError(new FormError('This is not valid.'));
$textForm->get('withErrors')->addError(new FormError('This must be greater than 0.'));

$template = $twig->loadTemplate('index.html.twig');

print $template->render(
    [
        'symfonyForm' => $form->createView(),
        'textForm' => $textForm->createView(),
    ]
);
