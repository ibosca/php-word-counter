<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 11/04/2019
 * Time: 00:36
 */

namespace App\Domain\Service;

use App\Domain\Sentence;

class FilterComposition
{

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

        foreach (Filter::availableFilters as $filterName => $filterClass){

            if(in_array($filterName, $filterNames)){
                $this->enabledFilters[] = new $filterClass();
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

}