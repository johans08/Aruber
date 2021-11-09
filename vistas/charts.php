<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <!-- JQUERY SCRIPTS -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBwlfK39eHtAoRvMLuu_sBTO8W3f3NGX9Q&sensor=TRUE_O_FALSE"></script>
        <script src="../js/maps.js"></script>
    </head>
    <body onload="load()" onunload="GUnload()" >  
        <div id="google_map" style="width: 600px; height: 400px;"></div>  
        <form action="#" onsubmit="setDirections(this.from.value); return false">  
            <input type="text" size="43" id="fromAddress" name="from" value=""/>  
            <input type="submit" value="Calcula la ruta">  
        </form>  
        <div id="direcciones" style="width: 500px;"></div>  


        <script type="text/javascript">
            var map;
            var gdir;
            var geocoder = null;
            var addressMarker;
            function load() {
                if (GBrowserIsCompatible()) {
                    map = new GMap2(document.getElementById("google_map"));
                    map.setMapType(G_HYBRID_MAP);
                    // Centramos el mapa en las coordenadas con zoom 15  
                    map.setCenter(new GLatLng(40.396764, -3.713379), 15);
                    // Creamos el punto.  
                    var point = new GLatLng(40.396764, -3.713379);
                    // Pintamos el punto  
                    map.addOverlay(new GMarker(point));
                    // Controles que se van a ver en el mapa  
                    map.addControl(new GLargeMapControl());
                    var mapControl = new GMapTypeControl();
                    map.addControl(mapControl);
                    // Asociamos el div 'direcciones' a las direcciones que devolveremos a Google  
                    gdir = new GDirections(map, document.getElementById("direcciones"));
                    // Para recoger los errores si los hubiera  
                    GEvent.addListener(gdir, "error", handleErrors);
                }
            }
            // Esta función calcula la ruta con el API de Google Maps  
            function setDirections(Address) {
                gdir.load("from: " + Address + " to: @40.396764, -3.713379",
                        {"locale": "es"});
                //Con la opción locale:es hace que la ruta la escriba en castellano.  
            }
            // Se han producido errores  
            function handleErrors() {
                if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS)
                    alert("Direccion desconocida");
                else if (gdir.getStatus().code == G_GEO_SERVER_ERROR)
                    alert("Error de Servidor");
                else if (gdir.getStatus().code == G_GEO_MISSING_QUERY)
                    alert("Falta la direccion inicial");
                else if (gdir.getStatus().code == G_GEO_BAD_KEY)
                    alert("Clave de Google Maps incorrecta");
                else if (gdir.getStatus().code == G_GEO_BAD_REQUEST)
                    alert("No se ha encontrado la direccion de llegada");
                else
                    alert("Error desconocido");
            }
            function onGDirectionsLoad() {
            }
        </script>  
    </body>  
</html>