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

    const WORDS   = 'words';
    const LETTERS = 'letters';
    const VOCALS = ['a', 'e', 'i', 'o', 'u'];

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
        $this->words = explode(' ', $this->body);
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

    public function numberOfWords() : int {
        return count($this->words);
    }

    public  function numberOfLetters() : int {
        return strlen($this->body);
    }

    public function wordsStartingWithVocal() : int {

        $words = 0;

        foreach ($this->words as $word){

            $initialLetter = substr(strtolower($word), 0, 1);

            if($this->isVocal($initialLetter)){
                $words++;
            }

        }

        return $words;

    }

    public function wordsLargerThanTwoCharactersLength() : int {

        $words = 0;

        foreach ($this->words as $word){

            if(strlen($word) > 2){
                $words++;
            }

        }

        return $words;

    }

    public function wordsStartingWithCapitalLetter() : int {

        $words = 0;

        foreach ($this->words as $word){

            $initialLetter = substr($word, 0, 1);

            if($this->isCapitalLetter($initialLetter)){
                $words++;
            }

        }

        return $words;
    }


    public function isVocal($letter) : bool {

        if(in_array($letter, Sentence::VOCALS)){
            return true;
        }

        return false;
    }

    public function isCapitalLetter($letter) : bool {

        $lowerCaseLetter = strtolower($letter);

        return $lowerCaseLetter != $letter;

    }


}