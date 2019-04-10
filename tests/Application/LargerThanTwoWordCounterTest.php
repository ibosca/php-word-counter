<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 09/04/2019
 * Time: 00:36
 */

namespace App\Tests\Application;

use App\Application\LargerThanTwoWordCounter;
use App\Domain\Sentence;
use PHPUnit\Framework\TestCase;
use App\Domain\Exception\EmptyStringException;

class LargerThanTwoWordCounterTest extends TestCase
{

    /**
     * @throws EmptyStringException
     */
    public function testCount()
    {
        $sentence = new Sentence("I have four words");

        $counter = new LargerThanTwoWordCounter($sentence);

        $expected = 3;
        $actual   = $counter->count();

        $this->assertEquals($expected, $actual);
    }

}