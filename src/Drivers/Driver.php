<?php

namespace razvan\PdfGen\Drivers;

use Mpdf\Mpdf;
use Dompdf\Dompdf;
use razvan\PdfGen\Exceptions\NoSuchDriverException;

abstract class Driver {

    protected $pdfDriver;

    public function __construct() {
        $this->pdfDriver = $this->initDriver(config('pdf.driver'));
    }

    public function getPdfDriver() {
        return $this->pdfDriver;
    }

    private function initDriver($driver) {
        switch ($driver) {
            case 'mpdf':
                return new Mpdf();
            case 'dompdf':
                return new Dompdf();
                break;
            default:
                throw new NoSuchDriverException();
        }
    }

    public abstract function create($htmlContent);

    public abstract function save($fileName, $mode);

    public static abstract function instance();
}
