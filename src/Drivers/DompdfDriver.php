<?php

namespace razvan\PdfGen\Drivers;

use razvan\PdfGen\Exceptions\ModeNotSopportedException;

class DompdfDriver extends Driver {

    public function __construct() {
        parent::__construct();
        $this->loadSettings();
    }

    public function create($htmlContent) {
        $this->pdfDriver->loadHtml($htmlContent);
        $this->pdfDriver->render();
    }

    public function save($fileName, $mode) {
        if ($mode == 'D') {
            $this->pdfDriver->stream($fileName);
        }  else {
            throw new ModeNotSopportedException('Mode ' . $mode . ' not supported for ' . config('pdf.driver') . ' driver.');
        }
    }

    private function loadSettings() {
        $this->pdfDriver->setPaper(config('pdf.dompdf_config.page'), config('pdf.dompdf_config.orientation'));
    }

    public static function instance() {
        return new DompdfDriver();
    }
    
}
