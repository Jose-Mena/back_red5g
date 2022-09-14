<?php require_once("view/header.php"); ?>

<?php 
    if(isset($_GET['site'])){
        if(file_exists("view/".$_GET['site'].".php")){
            require_once("view/".$_GET['site'].".php");
        }
    }
?>

<?php require_once("view/footer.php"); ?>