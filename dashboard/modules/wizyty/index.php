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
                        $wiersz = $rezultat->fetch_assoc();
                        if ($osoba = @$polaczenie->query('SELECT * FROM lekarze WHERE idLekarze=' . $wiersz['idLekarz'])) {
                            $osoba = $osoba->fetch_assoc();
                            echo "<li>" . $wiersz['Data'] . " - " . $wiersz['Godzina'] . " - " . $osoba['Specjalizacja'] . " - " . $osoba['Nazwisko'] . '<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>';
                        } else {
                            throw new Exception($polaczenie->error);
                        }
                    }
                } else {
                    throw new Exception($polaczenie->error);
                }
            } else {
                if ($rezultat = @$polaczenie->query("SELECT * FROM wizyty WHERE idLekarz=" . $_SESSION['userID'])) {
                    if ($rezultat->num_rows > 0) {
                        $wiersz = $rezultat->fetch_assoc();
                        if ($osoba = @$polaczenie->query("SELECT * FROM pacjenci WHERE idPacjenci=" . $wiersz['idPacjent'])) {
                            $osoba = $osoba->fetch_assoc();
                            echo "<li>" . $wiersz['Data'] . " - " . $wiersz['Godzina'] . " - " . $osoba['Imie'] . " " . $osoba['Nazwisko'] . '<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>';
                        } else {
                            throw new Exception($polaczenie->error);
                        }
                    }
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
                $(obj).remove();
                <?php
                require_once "../logowanie/connect.php";
                $osoba = @$polaczenie->query("UPDATE wizyty SET isActive=0 WHERE `idWizyty`=" . $wiersz['idWizyty'])
                ?>
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