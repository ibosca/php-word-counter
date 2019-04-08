<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 09/04/2019
 * Time: 00:36
 */

namespace App\Tests\ApplicationService\UseCase;

use App\ApplicationService\UseCase\LargerThanTwoWordCounter;
use App\Domain\Entity\Sentence;
use PHPUnit\Framework\TestCase;

class LargerThanTwoWordCounterTest extends TestCase
{

    public function testCount()
    {
        $sentence = new Sentence("I have four words");

        $counter = new LargerThanTwoWordCounter($sentence);

        $expected = 3;
        $actual   = $counter->count();

        $this->assertEquals($expected, $actual);
    }

}