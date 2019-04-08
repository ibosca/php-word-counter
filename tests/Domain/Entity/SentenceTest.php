<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 03/04/2019
 * Time: 03:13
 */

namespace App\Tests\Domain\Entity;

use App\Domain\Entity\Sentence;
use App\Domain\Entity\Word;
use PHPUnit\Framework\TestCase;

class SentenceTest extends TestCase
{
    public function testWordsBuilder()
    {
        $sentence = new Sentence("I have four words");

        $actual   = current($sentence->getWords());

        $this->assertInstanceOf(Word::class, $actual);
    }



}