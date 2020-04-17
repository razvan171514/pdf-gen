<?php

namespace razvan\PdfGen\Modules;

class HtmlModule extends BaseModule {

    public function __construct($template) {
        parent::__construct($template);
    }

    public function generate($saveOptions = []) {
        $this->baseGenerate(file_get_contents($this->templatePath), $saveOptions);
    }

    public static function instance($template) {
        return new HtmlModule($template);
    }

}
