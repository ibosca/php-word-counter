<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 08/04/2019
 * Time: 16:51
 */

namespace App\Domain\Entity;


use App\Domain\Exception\EmptyStringException;

class WordCounter
{

    /**
     * @var Sentence $sentence
     */
    protected $sentence;

    /**
     * @var array $words
     */
    private $words = [];

    /**
     * WordCounter constructor.
     * @param Sentence $sentence
     */
    public function __construct(Sentence $sentence)
    {
        $this->sentence = $sentence;
    }

    public function count() : int
    {
        $strings = explode(' ', $this->sentence->getBody());

        foreach ($strings as $string){

            try {
                $word = new Word($string);
            } catch (EmptyStringException $exception) {
                continue;
            }

            $this->words[] = $word;
        }

        return count($this->words);
    }


}