<?php

$dsn = "mysql:host=127.0.0.1;port=3306;dbname=dsa;"; //check extra semicolon at end
$username = "sungket";
$password = "saturn";

$dbh = new PDO($dsn, $username, $password);

$result = $dbh->query("SELECT * FROM categories ORDER BY parentCategory asc, 
sortInd asc", PDO::FETCH_OBJ);

$categories = [];

foreach ($result as $row) {
    $categories[$row->parentCategory][] = $row;
}

function showCategoryTree(Array $categories, int $n) {
    if (isset($categories[$n])) {

        foreach ($categories[$n] as $category) {
            echo str_repeat("-", $n) . "" . $category->categoryName . "<br>";
            showCategoryTree($categories, $category->id);
        }
    }
    return;
}

showCategoryTree($categories, 0);