<?php
include_once "connexion.php";

if (isset($_POST['idproduct'])) {
    $idproduct = $_POST['idproduct'];

    $sql = "SELECT * FROM article WHERE idproduct=?";
    $req = $db->prepare($sql);
    $req->execute(array($idproduct));

    $data = array();
    while ($row = $req->fetch()) {
        $product = array(
            'idproduct' => $row['idproduct'],
            'image' => $row['image'],
            'title' => $row['title'],
            'prix' => $row['prix']
        );
        $data[] = $product;
    }

    echo json_encode($data);
}
?>
