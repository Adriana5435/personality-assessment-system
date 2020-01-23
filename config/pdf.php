<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Questionnaire System',
	'display_mode'          => 'fullpage',
	'tempDir'               => storage_path(),
    'font_path' => public_path('fonts'),
    'font_data' => [
        'iransans' => [
            'R'  => 'IRANSansWeb.ttf',    // regular font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ],
    ]
];
