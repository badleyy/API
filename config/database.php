<?php

return [
  'fetch' => PDO::FETCH_CLASS,
  'default' => env('DB_CONNECTION', 'mysql'),
  'connections' => [
    'mysql' => [
      'driver'    => 'mysql',
      'host'      => env('DB_HOST', '192.168.0.13'),
      'database'  => env('DB_DATABASE', 'raft'),
      'username'  => env('DB_USERNAME', 'root'),
      'password'  => env('DB_PASSWORD', 'isnear'),
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
      'strict'    => false,
    ]
  ],
  'migrations' => 'migrations',
  'redis' => [
    'cluster' => false,
    'default' => [
        'host'     => '127.0.0.1',
        'port'     => 6379,
        'database' => 0,
    ]
  ]
];

?>
