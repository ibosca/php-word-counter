<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 02:50
 */

namespace App\Domain\Entity;

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
     * Sentence constructor.
     * @param $body
     */
    public function __construct($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

}