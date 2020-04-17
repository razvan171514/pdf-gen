<?php

namespace razvan\PdfGen\Modules;

use razvan\PdfGen\MarkdownParser;

class MarkdownModule extends BaseModule {

    public function __construct($template) {
        parent::__construct($template);
    }

    public function generate($saveOptions = []) {
        $this->baseGenerate($this->html(), $saveOptions);
    }

    private function html() {
        return MarkdownParser::instance()->parseFile($this->templatePath);
    }

    public static function instance($template) {
        return new MarkdownModule($template);
    }
    
}
