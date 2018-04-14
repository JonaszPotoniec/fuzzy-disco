<!DOCTYPE html>
<html>
<head>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
    <div class="fixedContainer">
        <div id="sideBar">
            <ul>
                <li id="title">Menu:</li>
                <li onclick="loadModule('wizyty')">Zaplanowane wizyty</li><br><br>
                <li onclick="loadModule('logowanie')">Zaloguj</li>
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
