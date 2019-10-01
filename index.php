<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>

    <!-- fct : returnInfoVille -->
    <script type="text/javascript" src="./scriptDuCours.js"> </script>
    <!-- <script type="text/javascript" src="./fctsJava.js"> </script> -->

                <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                <script type="text/javascript">
                function getWheatherFromTown(ville) {
                    $.ajax( {
                        url: "http://api.openweathermap.org/data/2.5/weather?q="+ville ,
                        method: 'GET' ,
                        async: true ,
                        data: {
                            // lat: latitude,
                            // lon: longitude ,
                            APPID: 'ee07e2bf337034f905cde0bdedae3db8' ,
                            units: 'metric' , //degre celsius
                            lang: 'fr'
                        },
                        complete:function(resultat) {
                            afficheDataWheather(resultat);
                        }
                    } )
                }

                function afficheDataWheather(leJSON) {
                    var dataJSON = leJSON.responseJSON ;

                    if(dataJSON.cod == "404") {        document.getElementById('affichageMeteo').innerHTML = "Oh non ! la ville n'a pas été trouvée !" ;}
                    else {
                        var humidite = dataJSON.main['humidity'] ;
                        var pression = dataJSON.main['pressure'] ;
                        var temperature = dataJSON.main['temp'] ;
                        var temperaturemax = dataJSON.main['temp_max'] ;
                        var temperaturemin = dataJSON.main['temp_min'] ;
                        var nomVille = dataJSON.name ;
                        var description =  dataJSON.weather[0].description ; //brouillard soleil toussa
                        var icon = "http://openweathermap.org/img/w/"+dataJSON.weather[0].icon+'.png' ;
                        var vent = dataJSON.wind.speed ;

                        var laffichagefinal = "Le temps actuel à "+nomVille+" est "+description+" " ;
                        laffichagefinal += "<img src="+icon+" alt='Description du temps'>"
                        laffichagefinal += "<br>" ;
                        laffichagefinal += "Taux d'humidité : "+humidite+"%" ;
                        laffichagefinal += "<br>" ;
                        laffichagefinal += "Pression : "+pression ;
                        laffichagefinal += "<br>" ;
                        laffichagefinal += "Temperature : "+temperature+"°C" ;
                        laffichagefinal += "<br>" ;
                        laffichagefinal += "Temperature maximale : "+temperaturemax+"°C" ;
                        laffichagefinal += "<br>" ;
                        laffichagefinal += "Temperature minimale : "+temperaturemin+"°C" ;
                        laffichagefinal += "<br>" ;
                        laffichagefinal += "Vitesse du vent : "+vent ;
                        laffichagefinal += "<br>" ;

                        document.getElementById('affichageMeteo').innerHTML = laffichagefinal ;
                    }
                }

                function recupPos()  {
                    var laLat ;
                    var laLong ;
                    //Récupération de la géolcalisation
                    // On vérifie que la méthode est implémentée dans le navigateur
                    if ( navigator.geolocation ) {
                        // On demande d'envoyer la position courante à la fonction callback
                        navigator.geolocation.getCurrentPosition( callback, erreur );
                    } else {
                        document.getElementById("TextFooter").innerHTML = "Votre navigateur ne prends pas en charge la position."
                    }
                }
                    function callback(positionRecuperee) {
                        laLat = positionRecuperee.coords.latitude ;
                        laLong = positionRecuperee.coords.longitude ;
                        document.getElementById("TextFooter").innerHTML = laLat ;
                    }
                    function erreur(err) {
                        var textToShow = "erreur " ;
                        textToShow += err.code ;
                        textToShow += " : " ;
                        textToShow += err.message ;
                        document.getElementById("TextFooter").innerHTML = textToShow ;
                    }

                document.onload = recupPos() ;
                </script>
                <!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->




    <title>Météo</title>
</head>





<body>
     <div class="header"> <?php include("./header.php") ; ?> </div>
<div style="padding: 1rem ;">

     <h1>Saisir la ville</h1>
    <div class="selectionVille" style="width: 20%">
        <input id="VilleVoulue" class="form-control mr-sm-2 " type="text" placeholder="Ex : Vannes" aria-label="" style="">
        <button id="bouttonEnvoie" class="btn btn-outline-info my-2 my-sm-0" type="submit" style="width: 100%" onclick="getWheatherFromTown(document.getElementById('VilleVoulue').value)">Envoyer</button>
    </div>

    <div id="affichageMeteo" class=""></div>


    <div class="footer fixed-bottom">
        <?php include("./footer.php") ?>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</div>
</body>
</html>
