<?php

    session_start();

    if(isset($_POST['email']))
    {
        //Udana walidacja? Załóżmy że tak!
        $wszystko_OK=true;
        
        //Sprawdź poprawność loginu
        $login = $_POST['nazwa-uzytkownika'];
        
        //Sprawdzenie dlugosci loginu
        if ((strlen($login)<3) || (strlen($login)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_login']="Login musi posiadać od 3 do 20 znaków";
        }
        
        if($wszystko_OK==true)
        {
           //User dodany
            echo "Udana walidacja!"; exit();
            
        }
            
    }

    if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
    {
        header('Location: ../../index.php');
        exit();
    }
?>

<div id="signupContainer">
    <input id="logowanieCheckbox" type="checkbox">
    <label for="logowanieCheckbox"><div  class="niceBtn">Zaloguj się</div></label>
    <div id="logowaie">
        <form action="modules/logowanie/zaloguj.php" method="post">
            <fieldset>
                <legend>Zaloguj się</legend>
                <input name="login" placeholder="Login" type="text"><br>
                <input name="haslo" placeholder="Hasło" type="password"><br>
                <?php
                
                    if(isset($_SESSION['blad']))    echo $SESSION['blad'];
                
                ?>
                <button type="submit" class="niceBtn">Zaloguj się</button>
            </fieldset>
        </form>
    </div>
    <input id="rejestracjaCheckbox" type="checkbox">
    <label for="rejestracjaCheckbox"><div  class="niceBtn">Zarejestruj się</div></label>
    <div id="rejestracja">
        <form method="post">
            <fieldset>
                <legend>Zarejestruj się</legend>
                <input name="nazwa_uzytkownika" placeholder="Login" type="text"><br>
                
                <?php
                
                    if(isset($_SESSION['e_login']))
                    {
                        echo '<div class="error">'.$_SESSION['e_login'].'</div>';
                        unset($_SESSION['e_login']);
                    }
                
                ?>
                
                <input name="haslo1" placeholder="Hasło" type="password"><br>
                <input name="haslo2" placeholder="Powtórz hasło" type="password"><br>
                <input name="email" placeholder="email" type="email"><br>
                <input name="imie" placeholder="Imię" type="password"><br>
                <input name="nazwisko" placeholder="Nazwisko" type="password"><br>
                <input name="pesel" placeholder="Pesel" type="password"><br>
                <input name="data" placeholder="Data urodzenia" type="password"><br>
                <input name="plec" placeholder="Plec" type="password"><br>
                <input name="ulica" placeholder="Ulica" type="password"><br>
                <input name="kod" placeholder="Kod pocztowy" type="password"><br>
                <input name="miasto" placeholder="Miasto" type="password"><br>
                <label>
                <input type="checkbox"><br> Akceptuje regulamin <br>
                </label>
                <div class="g-recaptcha" data-sitekey="6Lf-WlMUAAAAAHaj0HQ39dDufIv9vX0_EbUauNvS">
                </div>
                <button type="submit" class="niceBtn">Zarejestruj się</button>
            </fieldset>
        </form>
    </div>
</div>