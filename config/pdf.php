<?php

return [
    /** mpdf , dompdf*/
    'driver' => 'dompdf',
    'dompdf_config' => [
        'page' => 'A4',
        /** landscape, portrait */
        'orientation' => 'portrait',
        // 'css_path' => __DIR__ . '/../public/css',
    ],
    /** path to template directoy */
    'templates_path' => __DIR__ . '/../tests/templates/',
    'output_path' => __DIR__ . '/../tests/templates/pdfs/',
];