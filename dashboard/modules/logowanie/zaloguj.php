<?php

    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
    {
        header('Location: ../../index.php');
        exit();
    }

    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

    if($polaczenie->connect_errno!=0)
    {
        echo "Error:".$polaczenie->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        
        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        
        if ($rezultat = @$polaczenie->query(
        sprintf("SELECT * FROM dane_logowania WHERE nazwa_uzytkownika='%s'",
        mysqli_real_escape_string($polaczenie,$login))))
         {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {
                $wiersz = $rezultat->fetch_assoc();
                
                if (password_verify($haslo, $wiersz['Haslo']))
                {
                    $_SESSION['zalogowany'] = true;


                    $_SESSION['id'] = $wiersz['idDane_logowania'];
                    $_SESSION['nazwa_uzytkownika'] = $wiersz['Nazwa_uzytkownika'];
                    $_SESSION['haslo'] = $wiersz['Haslo'];
                    $_SESSION['haslo'] = $wiersz['Haslo'];
                    $_SESSION['pacjent'] = $wiersz['Pacjent'];
                    $_SESSION['userID'] = $wiersz['ID'];

                    unset($_SESSION['blad']);
                    $rezultat->free_result();
                    header('Location: ../../index.php?tab=wizyty');
                }
                else
                {
                    $SESSION['blad'] = '<span style="color:red">Nieprawididlowy login lub haslo!</span>'; 
                    header('Location: ../../index.php?tab=logowanie');
                }
            }
            else
            {
                $SESSION['blad'] = '<span style="color:red">Nieprawididlowy login lub haslo!</span>';
                header('Location: ../../index.php?tab=logowanie');
            }
         }
        
        $polaczenie->close();
    }


?>