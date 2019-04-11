<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 09/04/2019
 * Time: 00:36
 */

namespace App\Tests\Application;

use App\Application\CountWords;
use App\Domain\Sentence;
use App\Domain\Service\FilterComposition;
use PHPUnit\Framework\TestCase;
use App\Domain\Exception\EmptyStringException;

class WordCounterTest extends TestCase
{

    /**
     * @throws EmptyStringException
     */
    public function testCount()
    {
        $sentence = new Sentence("I have four words");
        $filterComposition = new FilterComposition([]);

        $counter = new CountWords($sentence, $filterComposition);

        $expected = 4;
        $actual   = $counter->count();

        $this->assertEquals($expected, $actual);
    }

}