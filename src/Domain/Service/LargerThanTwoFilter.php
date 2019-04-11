<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 08/04/2019
 * Time: 17:01
 */

namespace App\Domain\Service;

use App\Domain\Word;

class LargerThanTwoFilter extends Filter
{

    CONST name = 'LARGER_THAN_TWO';

    public function filter($words)
    {
        /** @var Word $word */
        foreach ($words as $key => $word){

            if(!$word->isLargerThanTwo()){
                unset($words[$key]);
            }

        }

        return $words;
    }

}