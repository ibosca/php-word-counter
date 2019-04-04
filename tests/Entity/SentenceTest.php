<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 03:13
 */

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Sentence;

class SentenceTest extends TestCase
{
    public function testWordsCount()
    {
        $sentence = new Sentence("I have four words");

        $expected = 4;
        $actual   = $sentence->numberOfWords();

        $this->assertEquals($expected, $actual);
    }

    public function testWordsStartingWithVocalsCount()
    {
        $sentence = new Sentence("I have four words");

        $expected = 1;
        $actual   = $sentence->wordsStartingWithVocal();

        $this->assertEquals($expected, $actual);
    }

    public function testWordsStartingWithCapitalLetterCount()
    {
        $sentence = new Sentence("I have four words");

        $expected = 1;
        $actual   = $sentence->wordsStartingWithCapitalLetter();

        $this->assertEquals($expected, $actual);
    }

    public function testWordsLargerThanTwoLetterCount()
    {
        $sentence = new Sentence("I have four words");

        $expected = 3;
        $actual   = $sentence->wordsLargerThanTwoCharactersLength();

        $this->assertEquals($expected, $actual);
    }



}