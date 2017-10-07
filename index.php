<?php

require __DIR__ . '/vendor/autoload.php';

$c = new \Main\Calculator\BinaryCalculator\BinaryCalculator(new \Main\Validator\BinaryValidator());

$c->add(11, -1);