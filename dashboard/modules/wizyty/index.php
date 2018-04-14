<?php

    session_start();

    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }

?>
<div>
    <?php
    
    echo "<p>Witaj ".$_SESSION['nazwa_uzytkownika']."![<a href="logout.php">Wyloguj sie</a>]</p>";
    
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
>>>>>>> f8f42997e140ccad20242706aba8557063e06779
</div>