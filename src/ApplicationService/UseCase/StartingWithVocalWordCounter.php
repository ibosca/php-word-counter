<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 08/04/2019
 * Time: 16:57
 */

namespace App\ApplicationService\UseCase;

use App\Domain\Entity\Word;

class StartingWithVocalWordCounter extends WordCounter
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

            if($word->isStartingWithVocal()){
                $this->words[] = $word;
            }

        }

        return count($this->words);
    }

}