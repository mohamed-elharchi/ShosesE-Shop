 
    <?php 
            include_once 'connexion.php';
            $sql="DELETE FROM article WHERE idproduct=?";
            $req=$db->prepare($sql);
            $req->execute(array($_GET["idproduct"]));
            header("location: dashboard.php");
    ?>
