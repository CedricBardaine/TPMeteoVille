function returnInfoVille() {
    var ret = "" ;

    $.ajax({
        url: "http://api.openweathermap.org/data/2.5/weather?q=vannes,fr&APPID=ee07e2bf337034f905cde0bdedae3db8",
        method: 'GET',
        async: true,
        dataType: "xml",
        success: function(xml) {
            $(xml).find('query').children().each(function() {
                ret += $(this).text() + "</br>";
            })
            $('#affichageMeteo').append(" : <br/>" + ret) ;
        }
        //remlacer le truc success par data chepa quoi 
    }) ;

    alert("hey") ;
}
