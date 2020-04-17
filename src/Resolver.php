<?php

namespace razvan\PdfGen;

use Illuminate\View\View;
use Illuminate\Support\Str;
use razvan\PdfGen\Exceptions\NoSuchFormatSupportedException;

class Resolver  {

    public static function resolve($template) {
        $module = '';
        if ($template instanceof View) {
            $module = 'Blade';
        } else {
            switch (Str::of($template)->after('.')) {
                case 'html':
                    $module = 'Html';
                    break;
                case 'md':
                    $module = 'Markdown';
                    break;
                default:
                    throw new NoSuchFormatSupportedException();
                    break;
            }
        }
        return $module . 'Module';
    }
    
}
