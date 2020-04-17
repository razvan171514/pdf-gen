<?php

namespace razvan\PdfGen\Modules;

use Exception;
use Illuminate\View\View;

class BladeModule extends BaseModule {

    protected $view;

    public function __construct($template) {
        parent::__construct($template);
        if ($template instanceof View) {
            $this->view = $template;
        } else {
            throw new Exception('No view passed in');
        }
    }

    public function generate($saveOptions = []) {
        $this->baseGenerate($this->html(), $saveOptions);
    }

    private function html() {
        return $this->view->render();
    }
    
    public static function instance($template) {
        return new BladeModule($template);
    }
    
}
