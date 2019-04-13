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

        foreach (Filter::filterNameAssoc as $filterName => $filterPublicName){

            if(in_array($filterPublicName, $filterNames)){
                $filerClass = Filter::availableFilters[$filterName];
                $this->enabledFilters[] = new $filerClass;
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