<h1>Dostępne terminy:</h1>
<script src="../../js/jquery-3.3.1.min.js"></script>
<script>
    function select(el) {
    console.log(el.id)
         $.ajax({
              type: "POST",
              url: "select.php",
              data: { time: el.id }
            }).done(function( selectTime ) {
              alert( "Wizyta zarezerwowana" );
             $(location).attr('href', "../../index.php");
        });    
    };
</script>
<?php

require_once "../logowanie/connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
if ($polaczenie->connect_errno != 0) {
    throw new Exception(mysqli_connect_errno());
}

$date = $_POST['date'];
$time = $_POST['time'];

$startTime = intval(substr ($time, 0, 2), 10) -1;
$endTime = intval(substr ($time, 0, 2), 10) +1;

$rezultat = @$polaczenie->query("SELECT Godzina FROM `wizyty` WHERE `isActive`= 1 AND `Data`= '$date' AND `Godzina` BETWEEN '".$startTime.substr ($time, 2, 3)."' AND '".$endTime.substr ($time, 2, 3)."'");
    
$wiersz = $rezultat->fetch_all();

for($z = 0; $z<8; $z++){
    $tempTime = $z > 3 ? $startTime + 1 : $startTime;
    $tempTime = $tempTime > 9 ? strval($tempTime) : "0".strval($tempTime);
    $tempTime = $tempTime.":".($z*15)%60;
    if(strlen($tempTime) == 4){
        $tempTime = $tempTime."0";
    }
    $tempTime = $tempTime.":"."00";
    
    $reserved = false;
    foreach($wiersz as $value){
        if($value[0] == $tempTime){
            $reserved = true;
        }
    }
    
    if($reserved){
        echo "<div class='reserved'><button disabled>wybierz</button> ".$tempTime." - zajęte</div>";
    }else{
        echo "<div><button id='".$tempTime."' onclick='select(this)'>wybierz</button> ".$tempTime."</div>";
    }
    echo "<br>";
}

?>

