<?php

error_reporting(E_ALL);
ini_set('display_errors', 1); // set second param to zero once development finished

require('config.php');
require('Track.php');

class DBReader extends Dbh { //ignore the error by intelliphense re: Dbh
    private $tracksArr = [];

    public function read() : array {
        $stmt = $this->connect()->query('SELECT * FROM tracks');
        while($row = $stmt->fetch()) {
            $trackName = $row['title'];
            $genre = $row['genre'];
            $path = $row['filepath'];
            $track = new Track($trackName, $genre, $path); //how to pass these objects
            array_push($this->tracksArr, $track);
        } 
        return $this->tracksArr;
    }

}