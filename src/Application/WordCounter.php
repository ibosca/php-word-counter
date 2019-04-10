<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 08/04/2019
 * Time: 16:51
 */

namespace App\Application;

use App\Domain\Sentence;

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

        $words = $this->sentence->getWords();

        foreach ($words as $word){

            $this->words[] = $word;
        }

        return count($this->words);
    }


}