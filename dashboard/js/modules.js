function loadModule(name){
    if((isMobile) & ($("#burgerCheckbox").is(":checked")))
        $("#burgerCheckbox").trigger('click');
        
    $.getJSON( "modules/"+name+"/properties.json", function(data){
        $("#content").load("modules/"+name+"/"+data.index, function() {
            $("#content").append("<style scoped>@import url("+ "modules/"+name+"/"+data.stylesheet +")</style>")
        });
    }).fail(function( jqxhr, textStatus, error ) {
            var err = textStatus + ", " + error;
            console.log( "Request Failed: " + err );
        });
}