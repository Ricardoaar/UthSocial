<?php

require("connection/Connection.php");

class Crud
{
    protected $table;
    protected PDO $connection;
    protected string $wheres = "";
    protected string $sql = "";

    public function __construct($table = null)
    {
        $connection = new Connection();
        $this->connection = ($connection->connect());
        $this->table = $table;
    }

    //READ
    public function get()
    {
        try {
            $this->sql = "SELECT * FROM $this->table $this->wheres order by `id`";
            $sth = $this->connection->prepare($this->sql);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_OBJ);
        } catch (Error $e) {
            echo $e->getTraceAsString();
        }
    }

    //CREATE
    function insert($obj)
    {
        try {
            //take keys and convert into a string => `name`, `lastName`,etc
            $fields = implode("`, `", array_keys($obj));
            //take values and convert into bindable string => :name, :lastName
            $values = ":" . implode(", :", array_keys($obj));
            $this->sql = "INSERT INTO $this->table(`$fields`) VALUES($values)";
            $this->execute($obj);
            return $this->connection->lastInsertId();
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }


    //UPDATE
    public function update($obj)
    {
        try {
            $fields = "";
            foreach ($obj as $key => $value) {
                $fields .= "`$key`=:$key,";
            }
            $fields = rtrim($fields, ",");
            $this->sql = "UPDATE $this->table SET $fields $this->wheres";
            return $this->execute($obj);
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }

    //DELETE
    public function delete()
    {
        try {
            /** @noinspection SqlWithoutWhere
             *Remember use WHERE when you modify wheres
             */
            $this->sql = "DELETE FROM $this->table  $this->wheres";
            return $this->execute();
        } catch (Exception $e) {
            echo $e->getTraceAsString();
        }
    }

    /**
     * @param $field : Field to validate
     * @param $condition : Condition to apply (such as >= =)
     * @param $value : Value we expect
     */
    public function where_and($field, $condition, $value): Crud
    {

        //If where exists and this is been executed, we are appending a condition, so we append "AND"
        $this->wheres .= (strpos($this->wheres, "WHERE")) ? " AND " : " WHERE ";
        //We create the sentence kind of... `name` = "cat" AND `AGE`= 15
        $this->wheres .= "`$field` $condition"
            . ((is_string($value) ? "\"$value\"" : $value)) . " ";
        return $this;
    }

    /**
     * @param $field : Field to validate
     * @param $condition : Condition to apply (such as >= =)
     * @param $value : Value we expect
     */
    public function where_or($field, $condition, $value): Crud
    {

        //If where exists and this is been executed, we are appending a condition, so we append "OR"
        $this->wheres .= (strpos($this->wheres, "WHERE")) ? " OR " : " WHERE ";
        //We create the sentence kind of... `name` = "cat" AND `AGE`= 15
        $this->wheres .= "`$field` $condition"
            . ((is_string($value) ? "'$value'" : $value)) . " ";
        //Why return this? Return itself to concat another sentences such as another where or get/delete/update
        return $this;
    }


    private function execute($obj = null): int
    {
        $query = $this->connection->prepare($this->sql);
        if ($obj !== null) {
            foreach ($obj as $key => $value) {
                if (empty($value)) {
                    $value = NULL;
                }
            }
            $query->bindValue(":$key", $value);

        }
        $query->execute();
        $this->restartValues();

        return $query->rowCount();
    }

    private function restartValues()
    {
        $this->wheres = "";
        $this->sql = "";
    }

}