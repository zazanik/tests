<?php

namespace Main\Calculator\BinaryCalculator;

use Main\Calculator\Calculator;

class BinaryCalculator extends Calculator
{
    public function add($a, $b)
    {
        $preparedNumbers = $this->prepareNumbers($a, $b);

        $firstNumberArray = $preparedNumbers->a;
        $secondNumberArray = $preparedNumbers->b;
        $length = $preparedNumbers->length;

        $result = array();

        for ($i = 0; $i <= $length; $i++) {
            if ($firstNumberArray[$i] + $secondNumberArray[$i] == 0) {
                $result[$i] = 0;
            }

            if ($firstNumberArray[$i] + $secondNumberArray[$i] == 1) {
                $result[$i] = 1;
            }

            if ($firstNumberArray[$i] + $secondNumberArray[$i] == 2) {
                $result[$i] = 0;
                $firstNumberArray[$i+1] += 1;
            }

            if ($firstNumberArray[$i] + $secondNumberArray[$i] == 3) {
                $result[$i] = 1;
                $firstNumberArray[$i+1] += 1;
            }
        }

        $result = $this->reverseArray($result);

        return intval(implode('', $result));
    }

    public function minus($a, $b)
    {
        if ($b > $a) {
            throw new \Exception('Second number should be less');
        }

        $preparedNumbers = $this->prepareNumbers($a, $b);

        $b = $this->reverseArray($preparedNumbers->b);
        $b = $this->inverseNumber($b);
        $b = intval(implode('', $b));

        $b = $this->add(1, $b);

        $result = $this->add($a, $b);

        return substr($result, 1);
    }

    private function inverseNumber($array)
    {
        for ($i = 0; $i < sizeof($array); $i++) {
            if ($array[$i] == 0) {
                $array[$i] = 1;
            } else {
                $array[$i] = 0;
            }
        }

        return $array;
    }

    private function prepareNumbers($a, $b)
    {
        $this->validator->validate($a);
        $this->validator->validate($b);

        $firstNumberArray = $this->getArrayFromNumber($a);
        $secondNumberArray = $this->getArrayFromNumber($b);

        $length = $this->getBiggestArrayLength($firstNumberArray, $secondNumberArray);

        $firstNumberArray = $this->addNullsToSmallerArray($firstNumberArray, $length);
        $secondNumberArray = $this->addNullsToSmallerArray($secondNumberArray, $length);

        $firstNumberArray = $this->reverseArray($firstNumberArray);
        $secondNumberArray = $this->reverseArray($secondNumberArray);

        $object = new \stdClass();

        $object->a = $firstNumberArray;
        $object->b = $secondNumberArray;
        $object->length = $length;

        return $object;
    }

    private function getArrayFromNumber($number)
    {
        return str_split($number);
    }

    private function getBiggestArrayLength($a, $b)
    {
        $aLength = sizeof($a);
        $bLength = sizeof($b);

        if ($aLength >= $bLength) {
            $result = $aLength;
        } else {
            $result = $bLength;
        }

        return $result;
    }

    private function addNullsToSmallerArray($array, $length)
    {
        $result = $array;
        $arrayLength = sizeof($array);

        if ($arrayLength < $length) {
            $nullArray = array();

            for ($i = 0; $i < $length - $arrayLength; $i++) {
                $nullArray[$i] = 0;
            }

            $result = array_merge($nullArray, $array);
        }

        return $result;
    }

    private function reverseArray($array)
    {
        return array_reverse($array);
    }
}
