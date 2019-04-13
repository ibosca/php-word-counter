<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 02:50
 */

namespace App\Domain;

use App\Domain\Exception\EmptyStringException;

class Sentence
{
    const WORDS   = 'words';

    /**
     * @var string $body
     */
    private $body;

    /**
     * @var array $words
     */
    private $words = [];

    /**
     * Sentence constructor.
     * @param $body
     * @throws EmptyStringException
     */
    public function __construct($body)
    {
        $this->body = trim($body);
        $this->buildWords();
    }

    /**
     * @throws EmptyStringException
     */
    public function buildWords() : void
    {
        if(empty($this->body)){
            throw new EmptyStringException();
        }

        $strings = explode(' ', $this->body);

        foreach ($strings as $string){

            $word = new Word($string);
            $this->words[] = $word;

        }
    }

    /**
     * @return array
     */
    public function getWords(): array
    {
        return $this->words;
    }

}