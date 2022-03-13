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

        if (str_contains($numbersString, ',\n')) {
            return sprintf('Number expected but \'\n\' found at position %d.', strpos($numbersString, ',\n') + 1);
        }

        $numbersString = str_replace('\n', ',', $numbersString);

        return array_sum(explode(',', $numbersString));
    }
}