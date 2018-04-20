<?php

    session_start();

    if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true))
    {
        echo "<script>loadModule('wizyty')</script>";
        exit();
    }
?>

<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
$("#data").datepicker();
var walidacja = {pesel: false, haslo: false, kod: false}

function validation(){
    document.getElementById("submitSignup").disabled = true;
    var finalResponse = true;
    for(var index in walidacja) {
        if(!walidacja[index])
            finalResponse = false
    }
    if(!document.getElementById("regulamin").checked)
        finalResponse = false;
    
    if(finalResponse)
        document.getElementById("submitSignup").disabled = false;
}
    
function confirmId(responseObject){
    walidacja['pesel'] = false;
    validation({dateFormat: "yy-mm-dd"});
    var pesel = document.getElementById("pesel").value; 
    if(pesel.length == 0){
        responseObject.innerHTML = "";
        return 0;   
    }
    if(pesel.length != 11){
        responseObject.innerHTML = "Zła długość"
    }else{
        if(pesel.match(/^[0-9]+$/)){
            if(((pesel.charAt(0)*9)+
                (pesel.charAt(1)*7)+
                (pesel.charAt(2)*3)+
                (pesel.charAt(3)*1)+
                (pesel.charAt(4)*9)+
                (pesel.charAt(5)*7)+
                (pesel.charAt(6)*3)+
                (pesel.charAt(7)*1)+
                (pesel.charAt(8)*9)+
                (pesel.charAt(9)*7)) % 10 == pesel.charAt(10)){
                    responseObject.innerHTML = ""
                    walidacja['pesel'] = true;
                    validation();
                    var dataUrodzenia = "";
                    if(pesel.substr(2, 2) > 12){
                        dataUrodzenia += pesel.charAt(4);
                        dataUrodzenia += pesel.charAt(5);
                        dataUrodzenia += '/';
                        dataUrodzenia += parseInt(pesel.charAt(2), 10) - 2;
                        dataUrodzenia += pesel.charAt(3);
                        dataUrodzenia += '/';
                        dataUrodzenia += '2';
                        dataUrodzenia += '0';
                        dataUrodzenia += pesel.charAt(0);
                        dataUrodzenia += pesel.charAt(1);
                    }else{
                        dataUrodzenia += pesel.charAt(4);
                        dataUrodzenia += pesel.charAt(5);
                        dataUrodzenia += '/';
                        dataUrodzenia += pesel.charAt(2);
                        dataUrodzenia += pesel.charAt(3);
                        dataUrodzenia += '/';
                        dataUrodzenia += '1';
                        dataUrodzenia += '9';
                        dataUrodzenia += pesel.charAt(0);
                        dataUrodzenia += pesel.charAt(1);
                    }
                    document.getElementById("data").value = dataUrodzenia;
                    if(pesel.charAt(9) % 2){
                        document.getElementById("plec").value = "Meżczyzna";
                    }else{
                        document.getElementById("plec").value = "Kobieta";
                    }
                }else{
                    responseObject.innerHTML = "Pesel nie jest poprawny<br>"
                }
        }else{
            responseObject.innerHTML = "Podaj poprawne liczby<br>"
        }
    }
}
    
function passwordValidation(){
    psd1 = document.getElementById("haslo1").value;
    psd2 = document.getElementById("haslo2").value;
    walidacja['haslo'] = false;
    validation();
    
    if(psd1 == psd2){
        if(psd1.length > 8){
            document.getElementById("passwordResponse").innerHTML = "";
            walidacja['haslo'] = true;
            validation();
        }else{
             document.getElementById("passwordResponse").innerHTML = "Hasło jest zbyt proste<br>"
        }
    }else{
         document.getElementById("passwordResponse").innerHTML = "Hasła są inne<br>"
    }
}
    
function confirmCode(){
    walidacja['kod'] = true;
    validation();
    var kod = document.getElementById("kod").value;
    if(kod.length == 6){
        if(kod.match(/([0-9]{2})[\-]([0-9]{3})/)){
                document.getElementById("responceCode").innerHTML = ""
                walidacja['kod'] = true;
                validation();
            }else{
                document.getElementById("responceCode").innerHTML = "Kod pocztowy niepoprawny<br>"
            }
    }else
        document.getElementById("responceCode").innerHTML = "Kod pocztowy niepoprawny<br>"
}
</script>


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
        <form method="post" action="modules/logowanie/zarejestruj.php">
            <fieldset>
                <legend>Zarejestruj się</legend>
                <input name="nazwa_uzytkownika" placeholder="Login" type="text"><br> 
                <input id="haslo1" name="haslo1" placeholder="Hasło" type="password"><br>
                <input id="haslo2" name="haslo2" placeholder="Powtórz hasło" type="password" onchange="passwordValidation()"><br>
                <div id="passwordResponse"></div>
                <input name="email" placeholder="email" type="email"><br>
                <input name="imie" placeholder="Imię" type="text"><br>
                <input name="nazwisko" placeholder="Nazwisko" type="text"><br>
                <input id="pesel" name="pesel" max="11" placeholder="Pesel" type="text" onchange="confirmId(document.getElementById('peselResponse'))"><br>
                <div id="peselResponse"></div>
                <input id="data" name="data" placeholder="Data urodzenia" type="text"><br>
                <input id="plec" name="plec" placeholder="Plec" type="text"><br>
                <input name="ulica" placeholder="Ulica" type="text"><br>
                <input id="kod" name="kod" placeholder="Kod pocztowy" type="text" onchange="confirmCode()"><br>
                <div id="responceCode"></div>
                <input name="miasto" placeholder="Miasto" type="text"><br>
                <label>
                <input id="regulamin" onclick="validation()" name="regulamin" type="checkbox"><br> Akceptuje regulamin <br>
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
                <button id="submitSignup" type="submit" class="niceBtn" disabled>Zarejestruj się</button>
            </fieldset>
        </form>
    </div>
</div>
