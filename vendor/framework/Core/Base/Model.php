<?php

namespace Vendor\Core\Base;

use Vendor\Core\Db;

abstract class Model
{
    protected $pdo;
    protected $table;
    protected $primKey = 'id';

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

    public function findOne($id, $field)
    {
        $field = $field ?? $this->primKey;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }

    public function findBySql($sql, $params = [])
    {
        return $this->pdo->query($sql, $params);
    }

    public function findLike($str, $field, $table = '')
    {
        $table = $table ?: $this->table;
        $sql = "SELECT * FROM {$table} WHERE {$field} LIKE ?";
        return $this->pdo->query($sql, ['%'. $str .'%']);
    }
}