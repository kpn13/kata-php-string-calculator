<?php

namespace App;

class StringCalculator
{
    public function __construct()
    {
    }

    public function add(string $numbersString): string
    {
        if ($numbersString === '') {
            return '0';
        }

        return array_sum(explode(',', $numbersString));
    }
}