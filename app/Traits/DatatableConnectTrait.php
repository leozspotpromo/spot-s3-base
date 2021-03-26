<?php

namespace App\Traits;

use DataTables\Database;

trait DatatableConnectTrait {

    public function getdb(){

        // Config datatable editor php lib
        return new Database([
            "type" => "Sqlserver",    // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
            "user" => getenv('DB_USERNAME'),    // User name
            "pass" => getenv('DB_PASSWORD'),    // Password
            "host" => getenv('DB_HOST'),    // Database server
            "port" => "",    // Database port (can be left empty for default)
            "db"   => getenv('DB_DATABASE'),    // Database name
            "dsn"  => "",    // PHP DSN extra information. Set as `charset=utf8mb4` if you are using MySQL
            "pdo"  => null   // Existing PDO connection. Use with `type` and no other parameters.
        ]);
    }
}