<?php

namespace razvan\PdfGen\Drivers;

class MpdfDriver extends Driver {

    public function __construct() {
        parent::__construct();
    }

    public function create($htmlContent) {
        $this->pdfDriver->WriteHTML($htmlContent);
    }

    public function save($fileName, $mode) {
        $this->pdfDriver->Output(($mode == 'D') ? $fileName : config('pdf.output_path') . $fileName, $mode);
    }

    public static function instance() {
        return new MpdfDriver();
    }
    
}
