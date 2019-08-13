<?php

namespace App\Helpers;

class CurrencyHelper
{
    public static function formatCurrency($amount) {
        $amount = floatval($amount);
        return number_format($amount, 2,',','.');

        /*switch($currency) {
            case "USD":
                setlocale(LC_MONETARY, 'en_US');
                return money_format('%i', $amount);
            case "IDR":
                return "IDR " . number_format($amount, 2,',','.');
        }*/
    }
}
