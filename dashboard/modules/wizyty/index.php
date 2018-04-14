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
    <img id="kosz" src="/img/kosz.png">
    <button id="nowaWizyta" class="circleBtn" onClick="loadModule('nowaWizyta')">+</button>
    <script>
        function removeEvent(obj){
            if(confirm("Czy na pewno chcesz odwołać wizytę?")){
                $(obj).remove();
            }
        }
        $('#kalendarz').datepicker();
        $("#wizyty ul li").each(function(){
            $(this).draggable({ revert: true });
        })
        $("#kosz").droppable({
            drop: function(event, ui){
                removeEvent(ui.draggable)
            },
            classes: {
                "ui-droppable-hover": "ui-state-hover, hover"
            }
        })
    </script>
</div>