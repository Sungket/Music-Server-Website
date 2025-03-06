<?php

include('../css/dsaStyle.css');

$dsn = "mysql:host=127.0.0.1;port=3306;dbname=dsa;"; //check extra semicolon at end
$username = "sungket";
$password = "saturn";

$dbh = new PDO($dsn, $username, $password);

$sql = "SELECT * FROM comments WHERE postID = :postID ORDER BY parentID asc, datetime asc";

$stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute(array(':postID' => 1));
$result = $stmt->fetchAll();

$comments = [];

foreach ($result as $row) {
    $comments[$row->parentID][] = $row;
}

function displayComment (Array $comments, int $n) {
    if (isset($comments[$n])) {
        $str = "<ul>";
        foreach ($comments[$n] as $comment) {
            $str .= "<li><div class='comment'><span class='pic'>
                {$comment->username}</span>";
            $str .= "<span class='datetime'>{comment->datetime}</span>";
            $str .= "<span class='commenttext'>" . $comment->comment . "</span></div>";

            $str .= displayComment($comments, $comment->id);
            $str .= "</li>";
        }

        $str .= "</ul>";

        return $str;
    }
    return "";
}

echo displayComment($comments, 0);