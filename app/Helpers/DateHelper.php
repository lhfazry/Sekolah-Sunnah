<?php

namespace App\Helpers;

class DateHelper
{
    public static function formatDate($date) {
        if(empty($date)) {
            return "";
        }
        else {
            return \Carbon\Carbon::parse($date)->format('d M Y');
        }
    }

    public static function formatDateMySQL($date) {
        if(empty($date)) {
            return "";
        }
        else {
            return \Carbon\Carbon::parse($date)->format('Y-m-d');
        }
    }

    public static function formatDateTime($dateTime) {
        if(empty($dateTime)) {
            return "";
        }
        else {
            return \Carbon\Carbon::parse($dateTime)->format('d M Y H:i:s');
        }
    }

    public static function isValidDate($date, $format = 'Y-m-d') {
        $d = \DateTime::createFromFormat($format, $date);
        var_dump($d);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && ($d->format($format) === $date);
    }
}
