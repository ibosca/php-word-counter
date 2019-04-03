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


}