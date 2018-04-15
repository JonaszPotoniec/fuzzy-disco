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
        <form >
            <fieldset>
                <legend>Zarejestruj się</legend>
                <input name="nazwa_uzytkownika" placeholder="Login" type="text"><br>
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
                <button type="submit" class="niceBtn">Zarejestruj się</button>
            </fieldset>
        </form>
    </div>
</div>