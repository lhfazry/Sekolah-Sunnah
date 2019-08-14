<?php

namespace App\Helpers;

class StringHelper
{
    public static function exceprt($string, $length = 150) {
        $str_len = strlen($string);
        $string = strip_tags($string);

        if ($str_len > $length) {
            // truncate string
            $stringCut = substr($string, 0, $length-15);
            $string = $stringCut.'.....'.substr($string, $str_len-10, $str_len-1);
        }

        return $string;
    }
}
