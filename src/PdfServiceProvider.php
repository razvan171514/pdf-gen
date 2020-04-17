<?php

namespace razvan\PdfGen;

use Illuminate\Support\ServiceProvider;

class PdfServiceProvider extends ServiceProvider {

    public function boot() {
        $this->publishes([
            __DIR__.'/../config/pdf.php' => config_path('pdf.php'),
        ]);
    }

    public function register() {
        $this->mergeConfigFrom(
            __DIR__.'/../config/pdf.php', 'pdf'
        );
        $this->loadViewsFrom(config('pdf.templates_path'), 'templates');
    }
    
}
