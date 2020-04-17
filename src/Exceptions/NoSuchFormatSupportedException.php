<?php

namespace razvan\PdfGen\Exceptions;

use Exception;

class NoSuchFormatSupportedException extends Exception {

    public function __construct($message = 'No such format supported.', $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    
}
