<?php

return [
    /** mpdf , dompdf*/
    'driver' => 'dompdf',
    'dompdf_config' => [
        'page' => 'A4',
        /** landscape, portrait */
        'orientation' => 'portrait',
    ],
    /** path to template directoy */
    'templates_path' => __DIR__ . '/../tests/templates/',
    /** path to output directory */
    'output_path' => __DIR__ . '/../tests/templates/pdfs/',
];