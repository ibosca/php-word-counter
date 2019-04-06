<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 6/04/19
 * Time: 17:08
 */

namespace App\Domain\Entity;


use App\Domain\Exception\EmptyStringException;

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
     * @throws EmptyStringException
     */
    public function __construct($text)
    {
        $this->update($text);
    }

    /**
     * @return mixed
     */
    public function getText() : string
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     * @throws EmptyStringException
     */
    public function setText($text) : void
    {
        $this->update($text);
    }

    /**
     * @param $text
     * @throws EmptyStringException
     */
    private function update($text) : void
    {
        if(empty($text)){
            throw new EmptyStringException();
        }

        $this->text = $text;
        $this->initialLetter = $this->getInitialLetter();
    }

    public function getInitialLetter() : string
    {
        return $initialLetter = substr($this->text, 0, 1);
    }

    public function isLargerThanTwo(): int
    {
        return strlen($this->text) > 2;
    }

    public function isStartingWithVocal() : bool
    {
        return in_array(strtolower($this->initialLetter), Word::VOCALS);
    }

    public function isStartingWithCapitalLetter() : bool
    {
        return strtolower($this->initialLetter) != $this->initialLetter;
    }


}