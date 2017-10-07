<?php

namespace Test\Validator;

use Main\Validator\BinaryValidator;
use Main\Validator\Validator;
use PHPUnit\Framework\TestCase;

class BinaryValidatorTest extends TestCase
{
    /**
     * @var Validator
     */
    protected $validator;

    public function setUp()
    {
        $this->validator = new BinaryValidator();
    }

    public function tearDown()
    {
        $this->validator = null;
    }

    public function exceptionProvider()
    {
        return [
            ['qwerty'],
            ['123'],
            [23],
            [17],
            [-11],
            [+12]
        ];
    }

    /**
     * @dataProvider exceptionProvider
     * @expectedException \Exception
     */
    public function testValidateException($data)
    {
        $this->validator->validate($data);
    }

    public function validateProvider()
    {
        return [
          [11],
          [1],
          [0],
          [1001001001]
        ];
    }

    /**
     * @dataProvider validateProvider
     */
    public function testValidate($data)
    {
        $result = $this->validator->validate($data);

        $this->assertEquals(null, $result);
    }
}
