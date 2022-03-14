<?php

namespace App;

class StringCalculator
{
    public function add(string $numbersString): string
    {
        if (empty($numbersString)) {
            return '0';
        }

        $separator = ',';

        if (preg_match('/^\/\/(.*)\\\n/', $numbersString, $matches)) {
            $separator = $matches[1];
            $numbersString = str_replace($matches[0], '', $numbersString);
        }

        if (str_contains($numbersString, $separator . '\n')) {
            return sprintf('Number expected but \'\n\' found at position %d.', strpos($numbersString, ',\n') + 1);
        }

        if (str_ends_with($numbersString, $separator)) {
            return 'Number expected but EOF found.';
        }

        $numbersString = str_replace('\n', $separator, $numbersString);

        if (preg_match('/([^0-9\.' . $separator . '])/', $numbersString, $matches)){
            return sprintf('\'%s\' expected but \'%s\' found at position %d.', $separator, $matches[0], strpos($numbersString, $matches[0]));
        }

        return array_sum(explode($separator, $numbersString));
    }
}