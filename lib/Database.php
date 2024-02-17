<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../config/config.php');

class Database
{
    public string $host = DB_HOST;
    public string $user   = DB_USER;
    public string $pass   = DB_PASS;
    public string $dbname = DB_NAME;


    public mysqli $link;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    }

    // Select or Read data
    public function select($query)
    {
        $result = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    // Insert data
    public function insert($query)
    {
        $insert_row = $this->link->query($query);
        // die($this->link->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            die($this->link->error . __LINE__);
        }
    }

    // Update data
    public function update($query)
    {
        $update_row = $this->link->query($query);

        if ($update_row) {
            return $update_row;
        } else {
            die($this->link->error . __LINE__);
        }
    }

    // Delete data
    public function delete($query)
    {
        $delete_row = $this->link->query($query);
        if ($delete_row) {
            return $delete_row;
        } else {
            die($this->link->error . __LINE__);
        }
    }

}