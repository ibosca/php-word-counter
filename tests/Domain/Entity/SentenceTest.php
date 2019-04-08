<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 03:13
 */

namespace App\Tests\Domain\Entity;

use App\Domain\Entity\Sentence;
use PHPUnit\Framework\TestCase;

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
        $actual   = $sentence->numberOfWordsStartingWithVocal();

        $this->assertEquals($expected, $actual);
    }

    public function testWordsStartingWithCapitalLetterCount()
    {
        $sentence = new Sentence("I have four words");

        $expected = 1;
        $actual   = $sentence->numberOfWordsStartingWithCapitalLetter();

        $this->assertEquals($expected, $actual);
    }

    public function testWordsLargerThanTwoLetterCount()
    {
        $sentence = new Sentence("I have four words");

        $expected = 3;
        $actual   = $sentence->numberOfWordsLargerThanTwoCharactersLength();

        $this->assertEquals($expected, $actual);
    }



}