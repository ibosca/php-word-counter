<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 11/04/2019
 * Time: 00:20
 */

namespace App\Application;


abstract class Filter
{
    CONST FILTERS = 'filters';

    public abstract function filter($words);

}