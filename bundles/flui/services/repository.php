<?php namespace FlUI\Services;

use Model;

class Repository extends Model {

    public static $table;

    public function __construct()
    {
    }

    public function set_table($table)
    {
        static::$table = $table;
    }

}