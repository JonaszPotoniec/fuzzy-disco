<?php

    session_start();

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
        <form method="post" action="zarejestruj.php" name="formularz">
            <fieldset>
                <legend>Zarejestruj się</legend>
                <input name="nazwa_uzytkownika" placeholder="Login" type="text"><br> 
                <input name="haslo1" placeholder="Hasło" type="password"><br>
                <input name="haslo2" placeholder="Powtórz hasło" type="password"><br>
                <input name="email" placeholder="email" type="email"><br>
                <input name="imie" placeholder="Imię" type="text"><br>
                <input name="nazwisko" placeholder="Nazwisko" type="text"><br>
                <input name="pesel" max="11" placeholder="Pesel" type="text"><br>
                <input name="data" placeholder="Data urodzenia" type="date"><br>
                <input name="plec" placeholder="Plec" type="text"><br>
                <input name="ulica" placeholder="Ulica" type="text"><br>
                <input name="kod" placeholder="Kod pocztowy" type="text"><br>
                <input name="miasto" placeholder="Miasto" type="text"><br>
                <label>
                <input name="regulamin" type="checkbox"><br> Akceptuje regulamin <br>
                </label>
                <div class="g-recaptcha" data-sitekey="6Lf-WlMUAAAAAHaj0HQ39dDufIv9vX0_EbUauNvS">
                </div>
                <?php
                    if(isset($_SESSION['e_bot']))
                    {
                        echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                        unset($_SESSION['e_bot']);
                    }
                ?>
                <button type="submit" class="niceBtn">Zarejestruj się</button>
            </fieldset>
        </form>
    </div>
</div>