<?php

use Swoft\Http\Server\HttpServer;
use App\Http\MyValidator\ProductValidator;
return [
    'logger'     => [
        'flushRequest' => false,
        'enable'       => false,
        'json'         => false,
    ],
    'httpServer' => [
        'class'   => HttpServer::class,
        'port'    => 18306,
        /* @see HttpServer::$setting */
        'setting' => [
            'worker_num' => 8,
        ]
    ],
    'db'    => [
        'class' => \Swoft\Db\Database::class,
        'dsn'   =>  'mysql:dbname=test;host=127.0.0.1',
        'username'  =>  'root',
        'password'  => '123456',
        'config'    => [
            'collation' => 'utf8mb4_general_ci',
            'strict'    => false,
            'timezone'  => '+8:00',
            'modes' =>  'NO_ENGINE_SUBSTITUTION,STRICT_TRANS_TABLES',
            'fetchMode' => PDO::FETCH_ASSOC,
        ]
    ],

    'swoftdb'    => [
        'class' => \Swoft\Db\Database::class,
        'dsn'   =>  'mysql:dbname=swoft;host=127.0.0.1',
        'username'  =>  'root',
        'password'  => '123456',
        'config'    => [
            'collation' => 'utf8mb4_general_ci',
            'strict'    => false,
            'timezone'  => '+8:00',
            'modes' =>  'NO_ENGINE_SUBSTITUTION,STRICT_TRANS_TABLES',
            'fetchMode' => PDO::FETCH_ASSOC,
        ]
    ],

    'db.pool'   => [
        'class' => \Swoft\Db\Pool::class,
        'database'  => \bean("db"),
        'minActive' =>  10,
        'maxActive' => 20,
        'maxWait'   => 0,
        'maxWaitTime'  => 0,
        'maxIdleTime'   => 60
    ],

    'swoftdb.pool'   => [
        'class' => \Swoft\Db\Pool::class,
        'database'  => \bean("swoftdb"),
        'minActive' =>  10,
        'maxActive' => 20,
        'maxWait'   => 0,
        'maxWaitTime'  => 0,
        'maxIdleTime'   => 60
    ]
];
