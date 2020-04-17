<?php

namespace razvan\PdfGen;

use Parsedown;

class MarkdownParser {

    private $parser;

    public function __construct() {
        $this->parser = new Parsedown();
    }

    public function parseFile($filePath) {
        return $this->parser->text(file_get_contents($filePath));
    }

    public function parseText($text) {
        return $this->parser->text($text);
    }

    public static function instance() {
        return new MarkdownParser();
    }
    
}
