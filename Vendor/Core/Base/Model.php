<?php

namespace Vendor\Core\Base;
use Vendor\Core\Db;

abstract class Model
{
    protected $pdo;

    protected $table;

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    public function findAll()
    {
    $sql = "SELECT * FROM {$this->table}";
    return $this->pdo->query($sql);
    }

}