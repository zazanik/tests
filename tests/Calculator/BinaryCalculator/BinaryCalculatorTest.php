<?php

namespace Test\Calculator\BinaryCalculator;

use Main\Calculator\BinaryCalculator\BinaryCalculator;
use Main\Validator\Validator;
use PHPUnit\Framework\TestCase;

class BinaryCalculatorTest extends TestCase
{
    /**
     * @var BinaryCalculator
     */
    private $calculator;

    public function setUp()
    {
        $mock = $this->getMockBuilder(Validator::class)
            ->setMethods(['validate'])
            ->disableOriginalConstructor()
            ->getMock()
        ;

        $mock->expects($this->any())
            ->method('validate')
            ->will($this->returnValue(true));


        $this->calculator = new BinaryCalculator($mock);
    }

    public function tearDown()
    {
        $this->calculator = null;
    }

    public function additionProvider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 10],
            [10, 10, 100],
            [11, 1, 100],
            [101, 10, 111],
            [11000, 111, 11111]
        ];
    }

    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $result = $this->calculator->add($a, $b);
        $this->assertEquals($result, $expected);
    }
}
