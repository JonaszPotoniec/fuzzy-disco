<?php
    require_once "../logowanie/connect.php";
    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    require_once "../logowanie/connect.php";
    echo $_GET['id'];
    $osoba = @$polaczenie->query("UPDATE wizyty SET isActive=0 WHERE `idWizyty`=".$_GET['id']);
    echo "<script>window.close();</script>";
?>