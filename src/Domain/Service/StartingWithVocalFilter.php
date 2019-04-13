<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 08/04/2019
 * Time: 16:57
 */

namespace App\Domain\Service;

use App\Domain\Word;

class StartingWithVocalFilter extends Filter
{

    CONST name = 'STARTING_WITH_VOCAL';
    CONST publicName = 'SV';

    public function filter($words)
    {
        /** @var Word $word */
        foreach ($words as $key => $word){

            if(!$word->isStartingWithVocal()){
                unset($words[$key]);
            }

        }

        return $words;
    }

}