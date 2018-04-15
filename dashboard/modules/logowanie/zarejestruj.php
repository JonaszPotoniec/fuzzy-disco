<?php

    session_start();

    if (isset($_POST['email']))
	{
		$wszystko_OK=true;

        $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
        $sekret = "6Lf-WlMUAAAAAK9A7tk-n2TpFx-vrzo9CTX6D6AI";

        $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

        $odpowiedz = json_decode($sprawdz);

        if ($odpowiedz->success==false)
        {
            $wszytsko_OK=false;
            $_SESSION['e_bot']="Potwierdź, że nie jesteś kodem";
        }
    
        require_once "connect.php";
        
        try
        {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                //czy email istnieje
                $rezultat = $polaczenie->query("SELECT id FROM ");
                
                
                $polaczenie->close();
            }
        }
        catch(Exception $e)
        {
            echo 'Błąd serwera';
            echo '<br>Informacja developerska:'.$e;
        }
    }

?>