<?php

    session_start();

    if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
    {
        header('Location: index.php');
        exit();
    }
?>

<div id="signupContainer">
    <input id="logowanieCheckbox" type="checkbox">
    <label for="logowanieCheckbox"><div  class="niceBtn">Zaloguj się</div></label>
    <div id="logowaie">
        <form action="zaloguj.php" method="post">
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
                <input placeholder="Login" type="text"><br>
                <input placeholder="Hasło" type="password"><br>
                <input placeholder="email" type="email"><br>
                <input placeholder="Imię" type="password"><br>
                <input placeholder="Nazwisko" type="password"><br>
                <input placeholder="Pesel" type="password"><br>
                <input placeholder="Data urodzenia" type="password"><br>
                <input placeholder="Plec" type="password"><br>
                <input placeholder="Ulica" type="password"><br>
                <input placeholder="Kod pocztowy" type="password"><br>
                <input placeholder="Miasto" type="password"><br>
                <button type="submit" class="niceBtn">Zarejestruj się</button>
            </fieldset>
        </form>
    </div>
</div>