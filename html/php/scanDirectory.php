<?php
//this class should output an array of objects that are created when the files are uploaded
class ScanDir {

  public function scan() : array {
    $path = $_SERVER['DOCUMENT_ROOT'] . "/uploads";
    $array = scandir($path);
    $filesArray = [];
    if (!empty($array)) {
      foreach ($array as $file) {
        if (!in_array($file, array(".", ".."))) {
          $filesArray[] = $file;
        }
      }
      return $filesArray;
    }
    throw new Exception("Directory is empty");
  }
}

