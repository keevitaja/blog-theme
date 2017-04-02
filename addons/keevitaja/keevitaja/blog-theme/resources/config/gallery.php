<?php

return [
    'classnames' => [
        'container' => 'gallery-container',
        'image' => 'gallery-image'
    ],
    'template' => [
        '.<container>-<type> { margin-bottom: -<gutter>; }',
        '.<container>-<type>:before { content: " "; display: table; }',
        '.<container>-<type>:after { content: " "; display: table; }',
        '.<container>-<type>:after { clear: both; }',
        '.<container>-<type> .<image> { display: block; float: right; width: calc((100% - <dividers> * <gutter>) / <columns>); margin-right: <gutter>; margin-bottom: <gutter>; text-decoration: none; }',
        '.<container>-<type> .<image>:nth-child(<columns>n+<columns>) { margin-right: 0; }',
        '.<container>-<type> .<image> img { display: block; width: 100%; }',
    ],
    'media' => '@media screen and (min-width: <breakpoint>px) { <rules> }',
    'types' => [
        'default' => [
            '0' => [
                'width' => '480px',
                'height' => '240px',
                'columns' => 1,
                'gutter' => '0'
            ],
            '480' => [
                'width' => '480px',
                'height' => '240px',
                'columns' => 2,
                'gutter' => '10px'
            ]
        ]
    ],
];