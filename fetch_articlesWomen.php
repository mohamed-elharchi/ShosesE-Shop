<?php
include_once "connexion.php";

$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$limit = 4; 

$sql = "SELECT * FROM article WHERE typee='Women' LIMIT $offset, $limit";
$req = $db->prepare($sql);
$req->execute();
$articles = $req->fetchAll(PDO::FETCH_ASSOC);
$articles_json = json_encode($articles);
header('Content-Type: application/json');
echo $articles_json;
?>
