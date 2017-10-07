<?php

require __DIR__ . '/vendor/autoload.php';

$calculator = new \Main\Calculator\BinaryCalculator(new \Main\Validator\BinaryValidator());

print_r($calculator->add(11000, 111));

