<?php

    session_start();

    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }

?>
<div>
    <?php
    
    echo "<p>Witaj".$SESSION[nazwa_uzytkownika]."![<a href="logout.php">Wyloguj sie</a>]</p>";
    
    ?>
</div>