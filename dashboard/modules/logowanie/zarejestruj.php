<?php

    session_start();

    if (isset($_POST['email']))
	{
		$wszystko_OK=true;

        $haslo_hash = password_hash($_POST['haslo1'], PASSWORD_DEFAULT);
        $sekret = "6Lf-WlMUAAAAAK9A7tk-n2TpFx-vrzo9CTX6D6AI";

        $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

        $odpowiedz = json_decode($sprawdz);

        if ($odpowiedz->success==false)
        {
            $wszytsko_OK=false;
            $_SESSION['e_bot']="Potwierdź, że nie jesteś kotem";
            header('Location: ../../index.php?tab=logowanie');
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
                $rezultat = $polaczenie->query("SELECT id FROM dane_logowania WHERE E-mail=".$_POST['email']);
                
                if($rezultat>0){
                    $wszytsko_OK=false;
                    $_SESSION['e_bot']="Email zajęty";
                    header('Location: ../../index.php?tab=logowanie');
                }
                
                //czy email istnieje
                $rezultat = $polaczenie->query("SELECT id FROM dane_logowania WHERE Nazwa_uzytkownika=".$_POST['nazwa_uzytkownika']);
                
                if($rezultat>0){
                    $wszytsko_OK=false;
                    $_SESSION['e_bot']="Nazwa uzytkownika zajęta";
                    header('Location: ../../index.php?tab=logowanie');
                }
                
				if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					
					if ($polaczenie->query("INSERT INTO pacjenci VALUES (NULL, '".$_POST['imie']."', '".$_POST['nazwisko']."', '".$_POST['pesel']."', ".$_POST['data'].", '".$_POST['plec']."', '".$_POST['ulica']."', '".$_POST['kod']."', '".$_POST['miasto']."')"))
					{
                        $id = $polaczenie->query("SELECT idPacjenci FROM pacjenci WHERE pesel=".$_POST['pesel'])->fetch_assoc();
                        if($polaczenie->query("INSERT INTO dane_logowania VALUES (NULL, '".$_POST['email']."', '".$_POST['nazwa_uzytkownika']."', '".$haslo_hash."', 1, ".(int)$id['idPacjenci'].")")){
                            $_SESSION['udanarejestracja']=true;
                            header('Location: ../../index.php?tab=logowanie');
                        }
                        else
                        {
                            throw new Exception($polaczenie->error);
                        }
					}
					else
					{
                        echo "INSERT INTO pacjenci VALUES (NULL, '".$_POST['imie']."', '".$_POST['nazwisko']."', '".$_POST['pesel'].", ".$_POST['data'].", '".$_POST['plec']."', '".$_POST['ulica']."', '".$_POST['kod']."', '".$_POST['miasto']."')";
						throw new Exception($polaczenie->error);
					}
					
				}
                
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