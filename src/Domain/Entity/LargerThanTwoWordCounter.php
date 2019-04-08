<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 08/04/2019
 * Time: 17:01
 */

namespace App\Domain\Entity;


use App\Domain\Exception\EmptyStringException;

class LargerThanTwoWordCounter extends WordCounter
{

    /**
     * @var array $words
     */
    private $words = [];

    public function count(): int
    {
        $strings = explode(' ', $this->sentence->getBody());

        foreach ($strings as $string){

            try {
                $word = new Word($string);
            } catch (EmptyStringException $exception) {
                continue;
            }

            if($word->isLargerThanTwo()){
                $this->words[] = $word;
            }
        }

        return count($this->words);
    }

}