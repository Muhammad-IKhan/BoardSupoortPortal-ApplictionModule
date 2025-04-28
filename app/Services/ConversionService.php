<?php

namespace App\Services;


use App\Models\{Year, Head, Student, Breakdown, Receipt, Application};
use Carbon\Carbon;

class ConversionService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    // public function convert_number_to_words(float $number): string;
    public function convert_number_to_words($number)
    {
        
        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary = array(
            0                   => 'Zero',
            1                   => 'One',
            2                   => 'Two',
            3                   => 'Three',
            4                   => 'Four',
            5                   => 'Five',
            6                   => 'Six',
            7                   => 'Seven',
            8                   => 'Eight',
            9                   => 'Nine',
            10                  => 'Ten',
            11                  => 'Eleven',
            12                  => 'Twelve',
            13                  => 'Thirteen',
            14                  => 'Fourteen',
            15                  => 'Fifteen',
            16                  => 'Sixteen',
            17                  => 'Seventeen',
            18                  => 'Eighteen',
            19                  => 'Nineteen',
            20                  => 'Twenty',
            30                  => 'Thirty',
            40                  => 'Forty',
            50                  => 'Fifty',
            60                  => 'Sixty',
            70                  => 'Seventy',
            80                  => 'Eighty',
            90                  => 'Ninety',
            100                 => 'Hundred',
            1000                => 'Thousand',
            1000000             => 'Million',
            1000000000          => 'Billion',
            1000000000000       => 'Trillion',
            1000000000000000    => 'Quadrillion',
            1000000000000000000 => 'Quintillion'
        );


        // Convert to string
        if (!is_numeric($number)) {
            return null; // Return null for non-numeric values
        }

        if ($number < 0) {
            return $negative . $this->convert_number_to_words(abs($number));
        }

        
        if ($number < 21) {

            return $dictionary[$number];
        }elseif ($number < 100) {
            $tens = floor($number / 10) * 10; // Get the nearest lower ten
            $units = $number % 10; // Get the unit part
            return $units ? $dictionary[$tens] . $hyphen . $dictionary[$units] : $dictionary[$tens];
        }

        if ($number < 1000) {
            $hundreds = floor($number / 100);
            $remainder = $number % 100;
            if ($remainder) {
                return $dictionary[$hundreds] . ' ' . $dictionary[100] . $conjunction . $this->convert_number_to_words($remainder);
            }
            return $dictionary[$hundreds] . ' ' . $dictionary[100];
        }

        // For numbers 1000 and above
        $base = 1000;
        $word = '';
        $count = 0;

        while ($number >= $base) {
            $count++;
            $base *= 1000;
        }

        $base /= 1000; // Step back to the previous base

        $word .= $this->convert_number_to_words(floor($number / $base)) . ' ' . $dictionary[$base];

        $remainder = $number % $base;

        if ($remainder) {
            $word .= $conjunction . $this->convert_number_to_words($remainder);
        }

        return $word;
    }


    // function convert_number_to_words($number) {
        // $hyphen      = '-';
        // $conjunction = ' and ';
        // $separator   = ', ';
        // $negative    = 'negative ';
        // $decimal     = ' point ';
        
        // $dictionary = array(
        //     0                   => 'Zero',
        //     1                   => 'One',
        //     2                   => 'Two',
        //     3                   => 'Three',
        //     4                   => 'Four',
        //     5                   => 'Five',
        //     6                   => 'Six',
        //     7                   => 'Seven',
        //     8                   => 'Eight',
        //     9                   => 'Nine',
        //     10                  => 'Ten',
        //     11                  => 'Eleven',
        //     12                  => 'Twelve',
        //     13                  => 'Thirteen',
        //     14                  => 'Fourteen',
        //     15                  => 'Fifteen',
        //     16                  => 'Sixteen',
        //     17                  => 'Seventeen',
        //     18                  => 'Eighteen',
        //     19                  => 'Nineteen',
        //     20                  => 'Twenty',
        //     30                  => 'Thirty',
        //     40                  => 'Forty',
        //     50                  => 'Fifty',
        //     60                  => 'Sixty',
        //     70                  => 'Seventy',
        //     80                  => 'Eighty',
        //     90                  => 'Ninety',
        //     100                 => 'Hundred',
        //     1000                => 'Thousand',
        //     1000000             => 'Million',
        //     1000000000          => 'Billion',
        //     1000000000000       => 'Trillion',
        //     1000000000000000    => 'Quadrillion',
        //     1000000000000000000 => 'Quintillion'
        // );

        // // Convert to string
        // if (!is_numeric($number)) {
        //     return null; // Return null for non-numeric values
        // }

        // if ($number < 0) {
        //     return $negative . convert_number_to_words(abs($number));
        // }

        // if ($number < 21) {

        //     return $dictionary[$number];

        // } elseif ($number < 100) {

        //     $tens = floor($number / 10) * 10; // Get the nearest lower ten
        //     $units = $number % 10; // Get the unit part
        //     return $units ? $dictionary[$tens] . $hyphen . $dictionary[$units] : $dictionary[$tens];

        // } elseif ($number < 1000) {

        //     $hundreds = floor($number / 100);
        //     $remainder = $number % 100;
            
        //     return $remainder ? 
        //         $dictionary[$hundreds] . ' Hundred' . $conjunction . convert_number_to_words($remainder) :
        //         $dictionary[$hundreds] . ' Hundred';
        // }

        // // For numbers above one thousand
        // foreach (array_reverse(array_keys($dictionary)) as $key) {
        //     if ($number >= $key) {
        //         $base = floor($number / $key);
        //         $remainder = $number % $key;

        //         return ($base > 1 ? convert_number_to_words($base) : '') . 
        //             ' ' . $dictionary[$key] . 
        //             ($remainder ? $conjunction . convert_number_to_words($remainder) : '');
        //     }
        // }
    // }
    
    
}
    
