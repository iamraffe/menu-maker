<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary' => base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'),
        'timeout' => false,
        'options' => array(
            'orientation' => 'portrait',
            'dpi' => 150,
            'lowquality' => false,
            'encoding' => 'utf8',
            'print-media-type' => true,
            'disable-smart-shrinking' => false,
            'page-size' => 'Letter',
            'no-pdf-compression' => true,
            'zoom' => 0.9775,
            'outline' => false,
            'margin-top' => 0,
            'margin-bottom' => 0,
            'margin-left' => 0,
            'margin-right' => 0,
            'enable-javascript' => true,
            'javascript-delay' => 3000,
        ),
    ),
    'image' => array(
        'enabled' => true,
        'binary' => base_path('vendor/h4cc/wkhtmltoimage-amd64/bin/wkhtmltoimage-amd64'),
        'timeout' => false,
        'options' => array(),
    ),
    


);
