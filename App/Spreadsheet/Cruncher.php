<?php

namespace App\Spreadsheet;

use PhpOffice\PhpSpreadsheet\IOFactory;

// I will update this code as times goes on, to show my critical thinking skills, and my coding style :)
class Cruncher
{
    private static $data;
    public function __construct(private $spreadsheet)
    {
        $this->spreadsheet = IOFactory::load($spreadsheet);
    }

    public function start(): void
    {
        if ($this->spreadsheet) {
            static::$data = $this->spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            static::balance();
        }
    }

    private static function balance(): void
    {
        $starting_balance = "100.41";
        $number_cruncher = [];

        // loop through each array...
        // echo 'starting posted balance is $100.41' . '<br/>';
        // echo 'we are adding or subtracting based on if trans adds or subtracts mone';
        foreach (static::$data as $array) {
            if ($array['A'] === 'Month') {
                $array['F'] = 'posted_balance';
            }

            // remove $, white spaces, and other unwanted characters from string
            if ($array['A'] !== 'Month') {
                if (is_string($array['D'])) {
                    $array['D'] = trim($array['D']);
                    $value = preg_replace('/[\$,]/', '', $array['D']);
                    $array['D'] = $value;
                }
            }

            // the magic...add and subtract based on depsosit or withdrawal
            if ($array['E'] === trim('deposit') || $array['E'] === trim('wire') || $array['E'] === trim('check')) {
                $array['D'] = trim($array['D']);
                $value = preg_replace('/[\$,]/', '', $array['D']);
                $array['F'] = $array['D'] + $starting_balance;
                $starting_balance = $array['F'];
            } else {
                if ($array['A'] !== 'Month') {
                    $array['F'] = $starting_balance - $array['D'];
                    $starting_balance = $array['F'];
                }
            }
            // add new data to array that we will return to the front-end
            if ($array['A'] === 'Month') {
                array_shift($array);
            } else {
                $number_cruncher[] = $array;
            }
            // print out new array after each calculation is performed
            // print("<pre>" . print_r($array, true) . "</pre>");
        }

        // display ending balance then return new data
        // echo "ending balance is {$array['F']}";
        $_SESSION['results'] = $number_cruncher;
    }
}