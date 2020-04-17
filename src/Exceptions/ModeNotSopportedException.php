<?php

namespace razvan\PdfGen\Exceptions;

use Exception;

class ModeNotSopportedException extends Exception  {

    public function __construct($message = 'This mode is not supported.', $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    
}
