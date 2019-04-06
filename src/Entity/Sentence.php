<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 02:50
 */

namespace App\Entity;


class Sentence
{

    const LETTERS = 'letters';

    /**
     * @var string $body
     */
    private $body;

    /**
     * @var array $words
     */
    private $words;

    /**
     * Sentence constructor.
     * @param $body
     */
    public function __construct($body)
    {
        $this->body  = $body;
        $this->buildWords();
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body): void
    {
        $this->body = $body;
        $this->buildWords();
    }

    /**
     * @return array
     */
    public function getWords(): array
    {
        return $this->words;
    }

    /**
     * @param array $words
     */
    public function setWords(array $words): void
    {
        $this->words = $words;
    }

    public function buildWords()
    {
        $strings = explode(' ', $this->body);
        unset($this->words);

        foreach ($strings as $string){
            $this->words[] = new Word($string);
        }
    }

    public function numberOfWords() : int {
        return count($this->words);
    }

    public  function numberOfLetters() : int {
        return strlen($this->body);
    }

    public function wordsStartingWithVocal() : int {

        $words = 0;

        /** @var Word $word */
        foreach ($this->words as $word){

            if($word->isStartingWithVocal()){
                $words++;
            }

        }

        return $words;

    }

    public function wordsLargerThanTwoCharactersLength() : int {

        $words = 0;

        /** @var Word $word */
        foreach ($this->words as $word){

            if($word->isLargerThanTwo()){
                $words++;
            }

        }

        return $words;

    }

    public function wordsStartingWithCapitalLetter() : int {

        $words = 0;

        /** @var Word $word */
        foreach ($this->words as $word){

            if($word->isStartingWithCapitalLetter()){
                $words++;
            }

        }

        return $words;
    }


}