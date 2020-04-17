<?php

namespace razvan\PdfGen\Exceptions;

use Exception;

class NoSuchDriverException extends Exception  {

    public function __construct($message = 'No such driver.', $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    
}
