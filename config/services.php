<?php

return [
    'postmark' => [
        'token' => env('POSTMARK_TOKEN', null), // Add default null
    ],

    'resend' => [
        'key' => env('RESEND_KEY', null), // Add default null
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID', null), // Add default null
        'secret' => env('AWS_SECRET_ACCESS_KEY', null), // Add default null
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN', null), // Add default null
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL', null), // Add default null
        ],
    ],
];
