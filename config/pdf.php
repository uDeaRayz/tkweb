<?php

return [
	'mode'                 => '',
	'format'               => 'A4',
	'default_font_size'    => '12',
	'default_font'         => 'sans-serif',
	'margin_left'          => 5,
	'margin_right'         => 5,
	'margin_top'           => 5,
	'margin_bottom'        => 5,
	'margin_header'        => 5,
	'margin_footer'        => 3,
	'orientation'          => 'P',
	'author'               => 'trakool',
	'watermark'            => '',
	'show_watermark'       => false,
	'watermark_font'       => 'sans-serif',
	'display_mode'         => 'fullpage',
    'watermark_text_alpha' => 0.1,
    'custom_font_dir' => base_path('public/font/'), // don't forget the trailing slash!
	'custom_font_data' => [
		'thfont' => [
            'R' => "THSarabunNew.ttf",
            'B' => "THSarabunNew Bold.ttf",
            'I' => "THSarabunNew Italic.ttf",
            'BI' => "THSarabunNew BoldItalic.ttf",
        ]
        ]
];

?>