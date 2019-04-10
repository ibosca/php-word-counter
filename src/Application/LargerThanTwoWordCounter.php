<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 08/04/2019
 * Time: 17:01
 */

namespace App\Application;

use App\Domain\Word;

class LargerThanTwoWordCounter extends WordCounter
{

    /**
     * @var array $words
     */
    private $words = [];

    public function count() : int
    {

        $words = $this->sentence->getWords();

        /** @var Word $word */
        foreach ($words as $word){

            if($word->isLargerThanTwo()){
                $this->words[] = $word;
            }

        }

        return count($this->words);
    }

}