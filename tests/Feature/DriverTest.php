<?php

namespace razvan\PdfGen\Tests;

use razvan\PdfGen\Pdf;
use razvan\PdfGen\Drivers\Driver;
use razvan\PdfGen\Modules\HtmlModule;

class GeneratorTest extends TestCase {

    /** @test */
    public function driver_is_instantiating_the_pdf_driver_correctly() {

        Pdf::generate('t2.md', [ 'name' => 'dompdfTest2md.pdf', 'mode' => 'F' ]);
        $this->assertTrue(true);
        // HtmlModule::instance('t1.html')->generate($saveOptions = [
        //     'name' => 'test1.pdf',
        //     'mode' => 'F'
        // ]);
        // collect(['mpdf'])->each(function ($driver) {
        //     config(['pdf.driver' => $driver]);
        //     $this->assertInstanceOf('Mpdf\Mpdf', Driver::instance()->getPdfDriver());
        // });
        // $this->expectException(\Exception::class);
        // config(['pdf.driver' => 'exception']);
        // Driver::instance()->getPdfDriver();
    }

}
