<?php

namespace razvan\PdfGen\Modules;

use Throwable;
use Illuminate\Support\Str;
use razvan\PdfGen\Exceptions\NoSuchDriverException;

abstract class BaseModule {

    protected $templatePath;
    protected $templateName;
    protected $driver;

    public function __construct($template) {
        if (is_string($template)) {
            $this->templatePath = config('pdf.templates_path') . $template;
            $this->templateName = $template;
        }
        try {
            $this->driver = ('\\razvan\\PdfGen\\Drivers\\' . Str::title(config('pdf.driver')) . 'Driver')::instance();
        } catch (Throwable $throable) {
            throw new NoSuchDriverException();
        }
    }
    
    protected function baseGenerate($htmlContent, $saveOptions = []) {
        if (!isset($saveOptions['mode'])) {
            $saveOptions = array_merge($saveOptions, [ 'mode' => 'D' ]);
        }
        // dd($saveOptions);
        $this->driver->create($htmlContent);
        $this->driver->save($saveOptions['name'] ?? 'file.pdf', $saveOptions['mode']);
    }

    public abstract function generate($saveOptions = []);

    public static abstract function instance($templateName);

}
