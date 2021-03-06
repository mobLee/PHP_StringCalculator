<?php

require_once('../src/StringCalculator.php');

class StringCalculatorTest extends PHPUnit_Framework_TestCase
{
    protected $stringCalculator;

    protected function setUp()
    {
        $this->stringCalculator = new StringCalculator();
    }

    public function testEmptyStringReturnsZero()
    {
        $sum = $this->stringCalculator->add('');
        $this->assertEquals(0, $sum);
    }

    public function testOneNumberStringReturnsSameNumber()
    {
        $sum = $this->stringCalculator->add('1');
        $this->assertEquals(1, $sum);
    }

    public function testTwoNumbersStringReturnsNumbersSum()
    {
        $sum = $this->stringCalculator->add('1,2');
        $this->assertEquals(3, $sum);
    }

    public function testAddMethodCanHandleMoreNumbers()
    {
        $sum = $this->stringCalculator->add('1,2,4,5');
        $this->assertEquals(12, $sum);
    }

    public function testAddMethodCanHandleLineBreaksAndCommas()
    {
        $sum = $this->stringCalculator->add('1\n2,3,4');
        $this->assertEquals(10, $sum);
    }

    public function testAddMethodCanHandleCustomDelimiter()
    {
        $sum = $this->stringCalculator->add('//;\n1;2;3;4');
        $this->assertEquals(10, $sum);
    }

    protected function tearDown()
    {
        unset($this->stringCalculator);
    }

}
 