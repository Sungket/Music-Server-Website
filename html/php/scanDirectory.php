<?php

class ScanDir {

  public function scan() {
    $array = scandir("uploads");
    if (!empty($array)) {
      foreach ($array as $name) {
        echo $name;
      }
    }
  }

}

