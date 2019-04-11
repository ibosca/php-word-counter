<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 09/04/2019
 * Time: 00:36
 */

namespace App\Tests\Domain\Service;

use App\Domain\Sentence;
use App\Domain\Service\StartingWithCapitalLetterFilter;
use PHPUnit\Framework\TestCase;
use App\Domain\Exception\EmptyStringException;

class StartingWithCapitalLetterFilterTest extends TestCase
{

    /**
     * @throws EmptyStringException
     */
    public function testCount()
    {
        $sentence = new Sentence("I have four words");

        $counter = new StartingWithCapitalLetterFilter();

        $expected = 1;
        $actual   = count($counter->filter($sentence->getWords()));

        $this->assertEquals($expected, $actual);
    }

}