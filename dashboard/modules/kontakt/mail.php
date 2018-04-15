<?php
    $imie = $_POST['imie'];
    $email = $_POST['email'];
    $wiadomosc = $_POST['wiadomosc'];

    mail("email@email.pl", $email." ".date("j m y H:i:s"), "Widomość od: ".$imie." Email: ".$email." Treść wiadomości: ".$wiadomosc, "From: ".$email);

    header('Location: ../../index.php?tab=wizyty');
?>