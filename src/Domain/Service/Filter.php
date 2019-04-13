<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 11/04/2019
 * Time: 00:20
 */

namespace App\Domain\Service;


abstract class Filter
{
    CONST FILTERS = 'filters';

    CONST availableFilters = [
        LargerThanTwoFilter::name => LargerThanTwoFilter::class,
        StartingWithCapitalLetterFilter::name => StartingWithCapitalLetterFilter::class,
        StartingWithVocalFilter::name => StartingWithVocalFilter::class
    ];

    CONST filterNameAssoc = [
        LargerThanTwoFilter::name => LargerThanTwoFilter::publicName,
        StartingWithCapitalLetterFilter::name => StartingWithCapitalLetterFilter::publicName,
        StartingWithVocalFilter::name => StartingWithVocalFilter::publicName
    ];

    public static function getAvailableFilters() : array
    {
        return array_values(self::filterNameAssoc);
    }

    public abstract function filter($words);

}