<!DOCTYPE html>
<html>
<head>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
    <?php

    session_start();

    ?>
    <div class="fixedContainer">
        <div id="sideBar">
            <ul>
                <li id="title">Menu:</li>
                <?php

                if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true)){
                    if($_SESSION['pacjent'] == 1){   
                        echo "
                        <li onclick=\"loadModule('wizyty')\">Zaplanowane wizyty</li>
                        <li onclick=\"loadModule('nowaWizyta')\">Nowa wizyta</li>
                        <br><br>
                        <li onclick=\"window.location = './modules/logowanie/logout.php'\">Wyloguj</li>
                        ";
                    }else if($_SESSION['pacjent'] == 0){
                        echo "
                        <li onclick=\"loadModule('wizyty')\">Zaplanowane wizyty</li>
                        <br><br>
                        <li onclick=\"window.location = './modules/logowanie/logout.php'\">Wyloguj</li>
                        ";
                    }
                }else{
                    echo "
                    <li onclick=\"loadModule('logowanie')\">Zaloguj</li>
                    ";
                }

                ?>
                <li onclick="loadModule('kontakt')">Kontakt</li>
                <li onclick="loadModule('faq')">FAQ</li>
            </ul>
        </div>
        <div id="menu">
            <div>
                <div id="burgerMenu">
                    <input type="checkbox" id="burgerCheckbox" onclick="openSideBar()">
                    <label for="burgerCheckbox" id="burgerCollider"></label>
                    <label for="burgerCheckbox" id="burger"></label>
                </div>
                    <?php

                    if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true)){
                        echo "
                            <div class='user'><p>Witaj ".$_SESSION['nazwa_uzytkownika']."</p>
                            ";
                    }

                    ?>
            </div>
        </div>
        <div id="contentContainer">
            <div id="content">
            </div>
        </div>
    </div>
    
    <script src="js/modules.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
