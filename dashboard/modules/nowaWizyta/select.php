<?php

function selectTime($time, $date, $specjalizacja, $id)
{
    require_once "../logowanie/connect.php";

    $polaczenie = @new mysqli("localhost", "root", "", "e-przychodnia");
    if ($polaczenie->connect_errno != 0) {
        throw new Exception(mysqli_connect_errno());
    }

    $idLekarza = @$polaczenie->query("SELECT idLekarze FROM lekarze WHERE Specjalizacja = '".$specjalizacja."'");
    $idLekarza = $idLekarza->fetch_assoc()['idLekarze'];
    @$polaczenie->query("INSERT INTO wizyty VALUES (NULL, '".$date."', '".$time."', '".$id."' , ".$idLekarza.", 1)");
}
parse_str($_SERVER['QUERY_STRING'], $queries);
print_r($queries);
selectTime($queries['time'], $queries['date'], $queries['specjalizacja'], $queries['id']);
echo "<script>window.close();</script>";