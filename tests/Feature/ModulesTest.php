<?php

namespace razvan\PdfGen\Tests;

use Illuminate\Support\Facades\File;
use razvan\PdfGen\Modules\HtmlModule;
use razvan\PdfGen\Modules\BladeModule;
use razvan\PdfGen\Modules\MarkdownModule;

class ModulesTest extends TestCase {

    /** Uncoment if you want to delete files created by the test before you run it */
    // public function setUp() : void {
    //     parent::setUp();
    //     collect(['test1.pdf', 'test2.pdf', 'test3.pdf', 'test4.pdf'])->each(function ($fileName) {
    //         $filePath = config('pdf.output_path') . $fileName;
    //         if (File::exists($filePath)) {
    //             File::delete($filePath);
    //         }
    //     });
    // }

    /** @test */
    public function html_module_test() {
        HtmlModule::instance('t1.html')->generate($saveOptions = [
            'name' => 'test1.pdf',
            'mode' => 'F'
        ]);
        $this->assertFileExists(config('pdf.output_path') . 'test1.pdf');
    }
    
    /** @test */
    public function markdown_module_test() {
        MarkdownModule::instance('t2.md')->generate($saveOptions = [
            'name' => 'test2.pdf',
            'mode' => 'F'
        ]);
        $this->assertFileExists(config('pdf.output_path') . 'test2.pdf');
    }

    /** @test */
    public function blade_module_test() {
        BladeModule::instance(view('templates::t3'))->generate($saveOptions = [
            'name' => 'test3.pdf',
            'mode' => 'F'
        ]);
        $this->assertFileExists(config('pdf.output_path') . 'test3.pdf');
    }

    /** @test */
    public function can_data_be_passed_to_blade_templates() {
        BladeModule::instance(view('templates::t4', [
            'user_name' => 'Ravan',
        ]))->generate($saveOptions = [
            'name' => 'test4.pdf',
            'mode' => 'F'
        ]);
        $this->assertFileExists(config('pdf.output_path') . 'test4.pdf');
    }

    /** @test */
    public function is_exception_thrown_if_view_is_not_string_or_View() {
        $this->expectException(\Exception::class);
        BladeModule::instance(34)->generate($saveOptions = [
            'name' => 'test4.pdf',
            'mode' => 'F'
        ]);
    }

    /** @test */
    public function are_the_other_modules_functioning_correctly_if_string_is_not_provided() {
        $this->expectException(\Exception::class);
        MarkdownModule::instance(34)->generate($saveOptions = [
            'name' => 'test2.pdf',
            'mode' => 'F'
        ]);
        $this->expectException(\Exception::class);
        HtmlModule::instance(34)->generate($saveOptions = [
            'name' => 'test1.pdf',
            'mode' => 'F'
        ]);
    }

}
