<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 09/04/2019
 * Time: 00:36
 */

namespace App\Tests\Domain\Service;

use App\Domain\Sentence;
use App\Domain\Service\LargerThanTwoFilter;
use PHPUnit\Framework\TestCase;
use App\Domain\Exception\EmptyStringException;

class LargerThanTwoFilterTest extends TestCase
{

    /**
     * @throws EmptyStringException
     */
    public function testCount()
    {
        $sentence = new Sentence("I have four words");

        $counter = new LargerThanTwoFilter();

        $expected = 3;
        $actual   = count($counter->filter($sentence->getWords()));

        $this->assertEquals($expected, $actual);
    }

}