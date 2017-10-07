<?php

namespace Main\Validator;

class BinaryValidator implements Validator
{
    const MAX_NUMERIC = 1;

    public function validate($number)
    {
        $this->checkForNumber($number);
        $this->checkNumberBitCapacity($number);
        $this->checkForSymbols($number);
    }

    /**
     * @param $number
     * @throws \Exception
     */
    protected function checkNumberBitCapacity($number)
    {
        $numberArray = str_split($number);

        foreach ($numberArray as $item) {
            if ($item > $this::MAX_NUMERIC) {
                throw new \Exception('Your number is not binary');
            }
        }
    }

    /**
     * @param $number
     * @throws \Exception
     */
    protected function checkForNumber($number)
    {
        if (! is_integer($number)) {
            throw new \Exception('You number must be integer');
        }
    }

    protected function checkForSymbols($number)
    {
        $numberArray = str_split($number);

        foreach ($numberArray as $item) {
            if ($item == '-' || $item == '+') {
                throw new \Exception('In your number should not be \'+\' or \'-\'');
            }
        }
    }
}
