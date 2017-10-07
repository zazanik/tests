<?php

namespace Main\Calculator;

use Main\Validator\Validator;

abstract class Calculator
{
    /**
     * @var Validator
     */
    protected $validator;

    /**
     * Calculator constructor.
     *
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    abstract function add($a, $b);

    abstract function minus($a, $b);
}
