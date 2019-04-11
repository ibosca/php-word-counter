<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 08/04/2019
 * Time: 16:51
 */

namespace App\Application;

use App\Domain\Sentence;
use App\Domain\Service\FilterComposition;

class WordCounter
{

    /**
     * @var Sentence $sentence
     */
    private $sentence;

    /**
     * @var FilterComposition $filter
     */
    private $filterComposition;

    /**
     * WordCounter constructor.
     * @param Sentence $sentence
     * @param FilterComposition $filterComposition
     */
    public function __construct(Sentence $sentence, FilterComposition $filterComposition)
    {
        $this->sentence            = $sentence;
        $this->filterComposition   = $filterComposition;
    }

    public function count() : int
    {
        $words = $this->filterComposition->execute($this->sentence);
        return count($words);
    }


}