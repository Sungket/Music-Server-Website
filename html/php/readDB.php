<?php

error_reporting(E_ALL);
ini_set('display_errors', 1); // set second param to zero once development finished

require('config.php');

class DBReader extends Dbh { //ignore the error by intelliphense re: Dbh
    public function read() {
        $stmt = $this->connect()->query('SELECT * FROM tracks');
        while($row = $stmt->fetch()) {
            echo $row['title'] . '<br>';
        } 
    }
}