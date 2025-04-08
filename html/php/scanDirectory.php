<?php
//this class should output an array of objects that are created when the files are uploaded
class ScanDir {

  public function scan() : array {
    $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads";
    $array = scandir($path);
    if (!empty($array)) {
      return $array;
    }
    throw new Exception("Directory is empty");
  }
}

