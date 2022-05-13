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

class DatabasesService
{
    private static $statusValues = [];

    private static function getStatusValues(string $statusName, array $statuses):void
    {
        foreach($statuses as $value => $status)
            if($status == $statusName)
                self::$statusValues[] = $value;
    }

    public static function filterStatus(string $statusName, array $statuses, array &$databases, array &$statusDatabases): void
    {
        self::getStatusValues($statusName, $statuses);

        foreach($databases as $database)
            foreach(self::$statusValues as $statusValue)
                if($database['status'] == $statusValue)
                {
                    $statusDatabases[] = $database;
                    break;
                }
    }
    
}

$statusName = 'ACTIVE';
DatabasesService::filterStatus($statusName, $statuses, $databases, $activeDatabases);

var_dump($activeDatabases);


