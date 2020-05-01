<?php

require_once __DIR__ . '/vendor/jadu/php-style/src/Config.php';

use Jadu\Style\Config;
use PhpCsFixer\Finder;

$finder = Finder::create();
$finder->in(__DIR__ . '/src');
$finder->in(__DIR__ . '/tests/unit');
$finder->in(__DIR__ . '/lexicon');

$config = new Config();
$config->setFinder($finder);

return $config;
