<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 06/04/2019
 * Time: 21:42
 */

namespace App\Tests\Domain;

use App\Domain\Word;
use PHPUnit\Framework\TestCase;

class WordTest extends TestCase
{

    public function testInitialLetter()
    {
        $word = new Word('Test');

        $expected = 'T';
        $actual   = $word->getInitialLetter();

        $this->assertEquals($expected, $actual);
    }

    public function testIsLargerThanTwo()
    {
        $word = new Word('Test');

        $expected = true;
        $actual   = $word->isLargerThanTwo();


        $this->assertEquals($expected, $actual);


        $word->setText('T');


        $expected = false;
        $actual   = $word->isLargerThanTwo();


        $this->assertEquals($expected, $actual);

    }

    public function testIsStartingWithVocal()
    {
        $word = new Word('iPhone');

        $expected = true;
        $actual   = $word->isStartingWithVocal();


        $this->assertEquals($expected, $actual);


        $word->setText('phone');

        $expected = false;
        $actual   = $word->isStartingWithVocal();


        $this->assertEquals($expected, $actual);
    }

    public function testIsStartingWithCapitalLetter()
    {
        $word = new Word('Phone');

        $expected = true;
        $actual   = $word->isStartingWithCapitalLetter();


        $this->assertEquals($expected, $actual);


        $word->setText('iPhone');

        $expected = false;
        $actual   = $word->isStartingWithCapitalLetter();


        $this->assertEquals($expected, $actual);
    }

}