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

    abstract public function add($a, $b);

    abstract public function minus($a, $b);
}
