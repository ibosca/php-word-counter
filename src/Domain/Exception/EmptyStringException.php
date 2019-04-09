<?php
/**
 * Created by PhpStorm.
 * User: isaac
 * Date: 06/04/2019
 * Time: 20:09
 */

namespace App\Domain\Exception;


use Exception;

class EmptyStringException extends Exception
{

    public function __construct($message = "Empty strings are not allowed.", $code = 400, Exception $previous = null) {

        parent::__construct($message, $code, $previous);
    }

    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function __toArray() : array {
        return [
            'code'    => $this->code,
            'message' => $this->message
        ];
    }

}