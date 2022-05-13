<?php

$statuses = [
    7 => 'DECLINED',
    5 => 'ACTIVE',
    3 => 'PAUSED',
    9 => 'ACTIVE',
];

$databases = [
    ['status' => 5, 'name' => 'MSSQL'],
    ['status' => 3, 'name' => 'MySQL'],
    ['status' => 5, 'name' => 'PostgreSQL'],
    ['status' => 7, 'name' => 'MariaDB'],
    ['status' => 9, 'name' => 'MongoDB'],
    ['status' => 5, 'name' => 'Cassandra'],
    ['status' => 3, 'name' => 'Snowflake'],
    ['status' => 5, 'name' => 'Oracle'],
    ['status' => 5, 'name' => 'Salesforce'],
];

$activeDatabases = [];

// copy ACTIVE $databases to $activeDatabases

$statusValues = [];
$statusName = 'ACTIVE';

foreach($statuses as $value => $status)
    if($status == $statusName)
        $statusValues[] = $value;

foreach($databases as $database)
    foreach($statusValues as $statusValue)
        if($database['status'] == $statusValue)
            {
               $activeDatabases[] = $database;
               break;
            }

var_dump($activeDatabases);


