<?php
require_once 'config.php';

class Database {
    
    private static $db;
    private $pdo;
    
    private function __construct() {
        try {
            $this->pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
        } catch (PDOException $e) {
            echo 'Ошибка при подключении к базе данных: '.$e->getMessage();
        }
    }
    
    public static function getDBO() {
        if (!self::$db) self::$db = new Database();
        return self::$db;
    }
    
    /*public function insert(string $table_name, array $fields, array $values) { 
        $sql = 'INSERT INTO'.$this->getTableName($table_name). '(';
        foreach ($fields as $field) {
            $sql .= $field . ', ';
        }
        $sql = substr($sql, 0, -2);
        $sql .= ') VALUES (';
        foreach ($values as $value) {
            $sql .= $value . ', ';
        }
        $sql = substr($sql, 0, -2);
        $sql .= ')';
        echo $sql; 
    }*/

    public function getCountRows(string $table_name, string $where = '', array $values = []) : int {
        $sql = 'SELECT COUNT(`id`) as `count` FROM '.$this->getTableName($table_name);
        if ($where) $sql .= " WHERE $where";
        $query = $this->pdo->prepare($sql);
        $query->execute($values);
        return $query->fetchColumn();
    }
    
    private function getTableName(string $table_name) : string {
        return '`'.DB_PREFIX.$table_name.'`';
    }
    
    public function getRows(string $table_name, string $where = '', array $values = [], string $order_by = '') : array {
        $sql = 'SELECT * FROM '.$this->getTableName($table_name);
        if ($where) $sql .= " WHERE $where";
        if ($order_by) $sql .= " ORDER BY `$order_by`";
        $query = $this->pdo->prepare($sql);
        $query->execute($values);
        return $query->fetchAll();
    }
    
    public function getRowByWhere(string $table_name, string $where, array $values = []) : array {
        $sql = 'SELECT * FROM '.$this->getTableName($table_name)." WHERE $where";
        $query = $this->pdo->prepare($sql);
        $query->execute($values);
        $result = $query->fetch();
        if ($result) return $result;
        return [];
    }
    
    public function getRowById(string $table_name, int $id) : array {
        return $this->getRowByWhere($table_name, '`id` = ?', [$id]);
    }
    
    public function getRowsByIds(string $table_name, array $ids) : array {
        if ($ids) {
            $in = str_repeat('?,', count($ids) - 1).'?';
            $sql = 'SELECT * FROM '.$this->getTableName($table_name)." WHERE `id` IN ($in)";
            $query = $this->pdo->prepare($sql);
            $query->execute($ids);
            $result = [];
            foreach ($query->fetchAll() as $row) {
                $result[$row['id']] = $row;
            }
            return $result;
        }
        return [];
    }
    
    public function update(string $table_name, array $fields, array $values, string $where = '', array $where_values = []) {
        $sql = 'UPDATE '.$this->getTableName($table_name).' SET ';
        foreach ($fields as $field) {
            $sql .= "`$field` = ?,";
        }
        $sql = substr($sql, 0, -1);
        if ($where) $sql .= " WHERE $where";
        $query = $this->pdo->prepare($sql);
        $query->execute(array_merge($values, $where_values));
    }
    
    public function __destruct() {
        $this->pdo = null;
    }
    
}

?>