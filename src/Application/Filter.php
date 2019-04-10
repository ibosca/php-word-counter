<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 11/04/2019
 * Time: 00:20
 */

namespace App\Application;


abstract class Filter
{
    CONST FILTERS = 'filters';

    CONST availableFilters = [
        LargerThanTwoFilter::name => LargerThanTwoFilter::class,
        StartingWithCapitalLetterFilter::name => StartingWithCapitalLetterFilter::class,
        StartingWithVocalFilter::name => StartingWithVocalFilter::class
    ];

    public static function getAvailableFilters() : array
    {
        return array_keys(self::availableFilters);
    }

    public abstract function filter($words);

}