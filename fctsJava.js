function getWheatherFromTown(ville) {
    $.ajax(
    {
        url: "http://api.openweathermap.org/data/2.5/weather?q="+ville ,
        method: 'GET' ,
        async: true ,
        data: {
            // lat: latitude,
            // lon: longitude ,
            APPID: 'ee07e2bf337034f905cde0bdedae3db8' ,
            units: 'metric' ,
            lang: 'fr'
        },
        complete:function(resultat) {
            var leTemps = resultat.responseJSON;
            getElementById('affichageMeteo').innerHTML = leTemps ;
        }
    }
)
}
