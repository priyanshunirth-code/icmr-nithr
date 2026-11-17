<?php
declare(strict_types=1);

return [
    'app_env' => 'production', // 'production' or 'development'
    'demo_mode' => false,
    'db' => [
        'dsn' => 'mysql:host=127.0.0.1;dbname=intranet_it_dashboard;charset=utf8mb4',
        'username' => 'portal_user',
        'password' => 'REPLACE_WITH_STRONG_DB_PASSWORD',
    ],
    'institution_name' => 'ICMR-NITHR',
    'app_name' => 'IT Administration Dashboard',
];
