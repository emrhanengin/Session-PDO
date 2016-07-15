<?php
class PDOext extends \PDO
{
    public function __construct($host, $db, $name, $password, $charset = 'utf8')
    {
        @parent::__construct('mysql:host=' . $host . ';dbname=' . $db, $name, $password);
        $this->query("SET CHARACTER SET '$charset'");
        $this->query("SET NAMES '$charset'");
    }
    public function select($tableName, $type = false, $valueSQL = false)
    {
        if ($type == false || $valueSQL == false)
        {
            $sql = "SELECT * FROM " . $tableName;
            return $this->query($sql);
        }
        else
        {
            $sql = "SELECT * FROM " . $tableName . " $type " . " $valueSQL";
            return $this->query($sql);
        }
    }
    public function insert($tableName, $set)
    {
        $sql = "INSERT INTO " . $tableName . " SET " . $set;
        return $this->query($sql);
    }
    public function update($tableName, $set, $whereSQL = false)
    {
        if ($whereSQL == false)
        {
            $sql = "UPDATE " . $tableName . " SET " . $set;
            return $this->query($sql);
        }
        else
        {
            $sql = "UPDATE " . $tableName . " SET " . $set . " WHERE " . $whereSQL;
            return $this->query($sql);
        }

    }
    public function delete($tableName,$where,$limit = false)
    {
        if ($limit == true)
        {
            $sql = "DELETE FROM $tableName WHERE $where LIMIT $limit";
        }
        else
        {
            $sql = "DELETE FROM $tableName WHERE $where";
        }
        return $this->query($sql);
    }
}
include "class.session.php";