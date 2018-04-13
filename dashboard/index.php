<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet">
    <script src="js/jquery-3.3.1.min.js"></script>
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
