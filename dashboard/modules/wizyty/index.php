<div id="container">
    <?php

    session_start();

    ?>
    <div id="wizyty">
        <ul>
            <?php
            require_once "../logowanie/connect.php";

            $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_errno != 0) {
                throw new Exception(mysqli_connect_errno());
            }

            if ($_SESSION['pacjent'] == 1) {
                if ($rezultat = @$polaczenie->query("SELECT * FROM wizyty WHERE isActive=1 AND idPacjent=" . $_SESSION['userID'])) {
                    if ($rezultat->num_rows > 0) {
                        $wiersz = $rezultat->fetch_all();
                        foreach($wiersz as $value){
                            if ($osoba = @$polaczenie->query('SELECT * FROM lekarze WHERE idLekarze=' . $value[4])) {
                                $osoba = $osoba->fetch_assoc();
                                echo "<li id='".$value[0]."'>" . $value[1] . " - " . $value[2] . " - " . $osoba['Specjalizacja'] . " - " . $osoba['Nazwisko'] . '<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>';
                            } else {
                                throw new Exception($polaczenie->error);
                            }
                        }
                    }
                } else {
                    throw new Exception($polaczenie->error);
                }
            } else {
                if ($rezultat = @$polaczenie->query("SELECT * FROM wizyty WHERE isActive=1 AND idLekarz=" . $_SESSION['userID'])) {
                    if ($rezultat->num_rows > 0) {
                        $wiersz = $rezultat->fetch_all();
                        foreach($wiersz as $value){
                            if ($osoba = @$polaczenie->query("SELECT * FROM pacjenci WHERE idPacjenci=" . $value[3])) {
                                $osoba = $osoba->fetch_assoc();
                                echo "<li id='".$value[0]."'>" . $value[1] . " - " . $value[2] . " - " . $osoba['Imie'] . " " . $osoba['Nazwisko'] . '<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>';
                        } else {
                            throw new Exception($polaczenie->error);
                        }
                    }}
                } else {
                    throw new Exception($polaczenie->error);
                }
            }
            ?>
        </ul>
    </div>
    <div id="kalendarz">
    </div>
    <div id="actionDiv">
        <img id="kosz" src="/img/kosz.png">
        <button id="nowaWizyta" class="circleBtn" onClick="loadModule('nowaWizyta')">+</button>
    </div>
    <script>
        function removeEvent(obj) {
            if (confirm("Czy na pewno chcesz odwołać wizytę?")) {
                console.log(obj[0].id)
                $(obj).remove();
                window.open("modules/wizyty/usun.php?id=" + obj[0].id);
                focus();
            }
        }

        $('#kalendarz').datepicker();
        $("#wizyty ul li").each(function () {
            $(this).draggable({
                revert: true,
                start: function (event, ui) {
                    $("#kosz").css("display", "block");
                    $("#nowaWizyta").css("display", "none");
                },
                stop: function (event, ui) {
                    $("#kosz").css("display", "none");
                    $("#nowaWizyta").css("display", "block");
                }
            });
        })
        $("#actionDiv").droppable({
            drop: function (event, ui) {
                removeEvent(ui.draggable)
            },
            classes: {
                "ui-droppable-hover": "ui-state-hover, hover"
            }
        })
    </script>
</div>