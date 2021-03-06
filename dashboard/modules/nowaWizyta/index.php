<div id="container">
    <div id="logowaie">
        <form action='./modules/nowaWizyta/show.php' method="post">
            <fieldset>
                <legend>Nowa wizyta</legend>
                <label for="lekarz">Lekarz:</label>
                <select name="lekarz" id="lekarz">
                    <option value="Internista">Internista</option>
                    <option value="Proktolog">Proktolog</option>
                    <option value="Seksuolog">Seksuolog</option>
                    <option value="Urolog">Urolog</option>
                </select>
                <label for="data">Data wizyty:</label>
                <input placeholder="Data" name="date" type="text" id="data"><br>
                <div class="input-group clockpicker">
                    <input type="text" name="time" class="form-control" placeholder="Godzina">
                    <span class="input-group-addon">
                    </span>
                </div>
                <button type="submit" class="niceBtn">Pokaż dostępne terminy</button>
            </fieldset>
        </form>
    </div>
    <script>;
        $( function() {
            $( "#data" ).datepicker({dateFormat:"yy-mm-dd"});
        });
        $('.clockpicker').clockpicker({
            default: 'now',
            placement: 'bottom',
            align: 'left',
            vibrate: 'true',
            donetext: 'Wybierz'
        });
    </script>
</div>