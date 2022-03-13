<?php

namespace App;

class StringCalculator
{
    public function __construct(private string $separator = ',')
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

        if (str_ends_with($numbersString, ',')) {
            return 'Number expected but EOF found.';
        }

        if (preg_match('/^\/\/(.*)\\\n/', $numbersString, $matches)) {
            $this->separator = $matches[1];
            $numbersString = str_replace($matches[0], '', $numbersString);
        }

        $numbersString = str_replace('\n', $this->separator, $numbersString);

        if (preg_match('/([^0-9\.' . $this->separator . '])/', $numbersString, $matches)){
            return sprintf('\'%s\' expected but \'%s\' found at position %d.', $this->separator, $matches[0], strpos($numbersString, $matches[0]));
        }

        return array_sum(explode($this->separator, $numbersString));
    }
}