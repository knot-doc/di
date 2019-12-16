<?php
return [
    'top' => [
        'prev' => null,
        'next' => 'introduction',
    ],
    'introduction' => [
        'prev' => 'top',
        'next' => 'quick-start',
    ],
    'quick-start' => [
        'prev' => 'introduction',
        'next' => 'basic-usage.configuring-container',
    ],

    // BASIC USAGE
    'basic-usage.configuring-container' => [
        'prev' => 'quick-start',
        'next' => 'basic-usage.using-container',
    ],
    'basic-usage.using-container' => [
        'prev' => 'basic-usage.configuring-container',
        'next' => null,
    ],
];
