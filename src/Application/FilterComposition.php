<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 11/04/2019
 * Time: 00:36
 */

namespace App\Application;

use App\Domain\Sentence;

class FilterComposition
{

    CONST availableFilters = [
        LargerThanTwoFilter::name => LargerThanTwoFilter::class,
        StartingWithCapitalLetterFilter::name => StartingWithCapitalLetterFilter::class,
        StartingWithVocalFilter::name => StartingWithVocalFilter::class
    ];

    /**
     * @var array $enabledFilters
     */
    private $enabledFilters = [];

    /**
     * FilterComposition constructor.
     * @param array $filterNames
     */
    public function __construct(array $filterNames)
    {

        foreach (self::availableFilters as $name => $filter){

            if(in_array($name, $filterNames)){
                $this->enabledFilters[] = new $filter();
            }

        }

    }

    public function execute(Sentence $sentence) : array
    {
        $words = $sentence->getWords();

        /** @var Filter $filter */
        foreach ($this->enabledFilters as $filter){
            $words = $filter->filter($words);
        }

        return $words;
    }

    public static function getAvailableFilters() : array
    {
        return array_keys(self::availableFilters);
    }


}