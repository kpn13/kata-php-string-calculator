<?php

namespace Test;

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class TestStringCalculator extends TestCase
{
    public function test_add_should_return_string_when_string()
    {
        $stringCalculator = new StringCalculator();

        $this->assertIsString($stringCalculator->add(''));
    }

    public function test_add_should_return_0_when_there_is_empty_input()
    {
        $stringCalculator = new StringCalculator();

        $this->assertEquals('0', $stringCalculator->add(''));
    }

    public function test_add_should_return_same_number_when_there_is_one_input()
    {
        $stringCalculator = new StringCalculator();

        $this->assertEquals('1', $stringCalculator->add('1'));
    }

    public function test_add_should_return_sum_when_there_are_two_inputs()
    {
        $stringCalculator = new StringCalculator();

        $this->assertEquals('3', $stringCalculator->add('1,2'));
    }

    public function test_add_should_return_sum_when_there_are_three_inputs()
    {
        $stringCalculator = new StringCalculator();

        $this->assertEquals('4.1', $stringCalculator->add('1,2,1.1'));
    }

    public function test_add_should_return_sum_when_there_are_four_inputs()
    {
        $stringCalculator = new StringCalculator();

        $this->assertEquals('27.1', $stringCalculator->add('1,2,1.1,23'));
    }

    public function test_add_should_return_sum_when_there_is_newline()
    {
        $stringCalculator = new StringCalculator();

        $this->assertEquals('27.1', $stringCalculator->add('1,2\n1.1,23'));
    }

    public function test_add_should_return_error_when_there_is_comma_before_newline()
    {
        $stringCalculator = new StringCalculator();

        $this->assertEquals('Number expected but \'\n\' found at position 6.', $stringCalculator->add('175.2,\n35'));
    }

    public function test_add_should_return_error_when_there_is_comma_as_last_char()
    {
        $stringCalculator = new StringCalculator();

        $this->assertEquals('Number expected but EOF found.', $stringCalculator->add('1,3,'));
    }
}
