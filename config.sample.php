<?php
// Copy to config.php and edit. config.php is git-ignored.
return [
    'site_name'  => 'JABB of the Carolinas',
    'base_url'   => '',            // '' when served from the web root; '/jabb' if in a subfolder
    'site_url'   => 'https://example.com', // used for canonical + Open Graph tags
    'debug'      => false,

    'db' => [
        'host'    => '127.0.0.1',
        'name'    => 'jabb',
        'user'    => 'jabb',
        'pass'    => 'change-me',
        'charset' => 'utf8mb4',
    ],

    // Contact form mail. Needs a working MTA on the server (postfix, msmtp, etc).
    'mail_from'  => 'website@example.com',
    'mail_routes' => [
        'general'   => 'info@jabbspe.com',
        'organic'   => 'organic@jabbspe.com',
        'marketing' => 'marketing@jabbspe.com',
        'support'   => 'support@jabbspe.com',
    ],
];
