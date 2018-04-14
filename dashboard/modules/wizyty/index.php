<?php

    session_start();

?>
<div>
    <?php
    
    if((isset($_SESSION['zalogowany']))&&($_SESSION['zalogowany']==true)){
        echo "<p>Witaj ".$_SESSION['nazwa_uzytkownika']."![<a href='modules/logowanie/logout.php'>Wyloguj sie</a>]</p>";
    }

    ?>

<div id="container">
    <div id="wizyty">
        <ul>
            <li>kk<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>
            <li>kk<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>
            <li>kk<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>
            <li>kk<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>
            <li>kk<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>
            <li>kk<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>
            <li>kk<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>
            <li>kk<button class="circleBtn" onclick="removeEvent($(this).parent())">X</button></li>
        </ul>
    </div>
    <div id="kalendarz">
    </div>
    <div id="actionDiv">
        <img id="kosz" src="/img/kosz.png">
        <button id="nowaWizyta" class="circleBtn" onClick="loadModule('nowaWizyta')">+</button>
    </div>
    <script>
        function removeEvent(obj){
            if(confirm("Czy na pewno chcesz odwołać wizytę?")){
                $(obj).remove();
            }
        }
        $('#kalendarz').datepicker();
        $("#wizyty ul li").each(function(){
            $(this).draggable({ 
                revert: true,
                start: function( event, ui){
                    $("#kosz").css("display", "block");
                    $("#nowaWizyta").css("display", "none");
                },
                stop: function( event, ui){
                    $("#kosz").css("display", "none");
                    $("#nowaWizyta").css("display", "block");
                }
            });
        })
        $("#actionDiv").droppable({
            drop: function(event, ui){
                removeEvent(ui.draggable)
            },
            classes: {
                "ui-droppable-hover": "ui-state-hover, hover"
            }
        })
    </script>
</div>