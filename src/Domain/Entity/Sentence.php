<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 02:50
 */

namespace App\Domain\Entity;


use App\Domain\Exception\EmptyStringException;

class Sentence
{

    const LETTERS = 'letters';
    const WORDS   = 'words';

    const WORDS_STARTING_WITH_VOCALS         = 'wordsStartingWithVocals';
    const WORDS_LARGER_THAN_TWO              = 'wordsLargerThanTwo';
    const WORDS_STARTING_WITH_CAPITAL_LETTER = 'wordsStartingWithCapitalLetter';

    /**
     * @var string $body
     */
    private $body;

    /**
     * @var array $words
     */
    private $words;

    /**
     * @var array $wordsStartingWithVocal
     */
    private $wordsStartingWithVocal;

    /**
     * @var array $wordsLargerThanTwo
     */
    private $wordsLargerThanTwo;

    /**
     * @var array $wordsStartingWithCapitalLetter
     */
    private $wordsStartingWithCapitalLetter;

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
        new self($body);
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

    /**
     * @return array
     */
    public function getWordsStartingWithVocal(): array
    {
        return $this->wordsStartingWithVocal;
    }

    /**
     * @param array $wordsStartingWithVocal
     */
    public function setWordsStartingWithVocal(array $wordsStartingWithVocal): void
    {
        $this->wordsStartingWithVocal = $wordsStartingWithVocal;
    }

    /**
     * @return array
     */
    public function getWordsLargerThanTwo(): array
    {
        return $this->wordsLargerThanTwo;
    }

    /**
     * @param array $wordsLargerThanTwo
     */
    public function setWordsLargerThanTwo(array $wordsLargerThanTwo): void
    {
        $this->wordsLargerThanTwo = $wordsLargerThanTwo;
    }

    /**
     * @return array
     */
    public function getWordsStartingWithCapitalLetter(): array
    {
        return $this->wordsStartingWithCapitalLetter;
    }

    /**
     * @param array $wordsStartingWithCapitalLetter
     */
    public function setWordsStartingWithCapitalLetter(array $wordsStartingWithCapitalLetter): void
    {
        $this->wordsStartingWithCapitalLetter = $wordsStartingWithCapitalLetter;
    }

    public function buildWords()
    {
        $strings = explode(' ', $this->body);
        $this->unsetWords();

        foreach ($strings as $string){

            try {
                $word = new Word($string);
            } catch (EmptyStringException $exception) {
                continue;
            }

            $this->words[] = $word;

            if($word->isStartingWithVocal()){
                $this->wordsStartingWithVocal[] = $word;
            }

            if($word->isLargerThanTwo()){
                $this->wordsLargerThanTwo[] = $word;
            }

            if($word->isStartingWithCapitalLetter()){
                $this->wordsStartingWithCapitalLetter[] = $word;
            }

        }
    }

    public function unsetWords() {

        $this->words = [];
        $this->wordsStartingWithVocal = [];
        $this->wordsLargerThanTwo = [];
        $this->wordsStartingWithCapitalLetter = [];

    }

    public function numberOfWords() : int {
        return count($this->words);
    }

    public  function numberOfLetters() : int {
        return strlen($this->body);
    }

    public function numberOfWordsStartingWithVocal() : int {
        return count($this->wordsStartingWithVocal);
    }

    public function numberOfWordsLargerThanTwoCharactersLength() : int {
        return count($this->wordsLargerThanTwo);
    }

    public function numberOfWordsStartingWithCapitalLetter() : int {
        return count($this->wordsStartingWithCapitalLetter);
    }

}