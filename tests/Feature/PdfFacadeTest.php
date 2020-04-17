<?php

namespace razvan\PdfGen\Tests;

use razvan\PdfGen\Pdf;

class PdfFacadeTest extends TestCase {

    /** @test */
    public function facase_is_generating_markdown_correctly() {
        Pdf::generate('t2.md', [ 'name' => 'pdfTest1md.pdf', 'mode' => 'F' ]);
        $this->assertFileExists(config('pdf.output_path') . 'pdfTest1md.pdf');
    }
    
    /** @test */
    public function facase_is_generating_html_correctly() {
        Pdf::generate('t1.html', [ 'name' => 'pdfTest1html.pdf', 'mode' => 'F' ]);
        $this->assertFileExists(config('pdf.output_path') . 'pdfTest1html.pdf');
    }

    /** @test */
    public function facase_is_generating_blade_wothout_data_passed_correctly() {
        Pdf::generate(view('templates::t3'), [ 'name' => 'pdfTest1blade.pdf', 'mode' => 'F' ]);
        $this->assertFileExists(config('pdf.output_path') . 'pdfTest1blade.pdf');
    }

    /** @test */
    public function facase_is_generating_blade_with_data_passed_correctly() {
        Pdf::generate(view('templates::t4', [
            'user_name' => 'Alex',
        ]), [ 'name' => 'pdfTest2blade.pdf', 'mode' => 'F' ]);
        $this->assertFileExists(config('pdf.output_path') . 'pdfTest2blade.pdf');
    }

}
