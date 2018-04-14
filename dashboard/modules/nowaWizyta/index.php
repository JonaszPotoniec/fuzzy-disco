<div id="container">
    <div id="logowaie">
        <form>
            <fieldset>
                <legend>Nowa wizyta</legend>
                <label for="lekarz">Lekarz:</label>
                <select name="lekarz" id="lekarz">
                    <option value="internista">internista</option>
                    <option value="proktolog">internista</option>
                    <option value="seksuolog">seksuolog</option>
                    <option value="urolog">urolog</option>
                </select>
                <label for="data">Data wizyty:</label>
                <input placeholder="Data" type="text" id="data"><br>
                <button type="submit" class="niceBtn">Pokaż dostępne terminy</button>
            </fieldset>
        </form>
    </div>
    <script>
        $( function() {
            $( "#data" ).datepicker();
        });
    </script>
</div>