function loadFAQ(){
    $.getJSON( "/dashboard/modules/faq/src/faq.json", function(data){
        data.forEach(function(item, index){
            $("#faqContainer").append(
                "<hr><h5>"+item.question+"</h5><p>"+item.answer+"</p>"
            );
        })
        $("#faqContainer").append("<hr>")
    }).fail(function( jqxhr, textStatus, error ) {
            var err = textStatus + ", " + error;
            console.log( "Request Failed: " + err );
        });
}

loadFAQ();