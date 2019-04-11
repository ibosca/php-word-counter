<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 08/04/2019
 * Time: 17:05
 */

namespace App\Domain\Service;

use App\Domain\Word;

class StartingWithCapitalLetterFilter extends Filter
{

    CONST name = 'STARTING_WITH_CAPITAL_LETTER';

    public function filter($words)
    {
        /** @var Word $word */
        foreach ($words as $key => $word){

            if(!$word->isStartingWithCapitalLetter()){
                unset($words[$key]);
            }

        }

        return $words;
    }

}