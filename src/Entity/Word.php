<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 6/04/19
 * Time: 17:08
 */

namespace App\Entity;


class Word
{

    const VOCALS = ['a', 'e', 'i', 'o', 'u'];

    /**
     * @var string $text
     */
    private $text;

    /**
     * @var string $initialLetter
     */
    private $initialLetter;

    /**
     * Word constructor.
     * @param string $text
     */
    public function __construct($text)
    {
        if(empty($text)){
            throw new \LengthException("Empty strings are not allowed.");
        }

        $this->text = $text;
        $this->initialLetter = $this->getInitialLetter();
    }

    /**
     * @return mixed
     */
    public function getText() :string
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

    public function getInitialLetter() : string
    {
        return $initialLetter = substr($this->text, 0, 1);
    }

    public function isLargerThanTwo(): int
    {
        return strlen($this->text) > 2;
    }

    public function isStartingWithVocal() : bool {

        if(in_array(strtolower($this->initialLetter), Word::VOCALS)){
            return true;
        }

        return false;
    }

    public function isStartingWithCapitalLetter() : bool {

        $lowerCaseLetter = strtolower($this->initialLetter);

        return $lowerCaseLetter != $this->initialLetter;

    }


}