<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        html,
        body,
        #map {
            height: 99%;
            width: 100vw;
        }
    </style>
</head>

<body>
    <input id="value" data-LatLng='' value="123">
    <div id="map"></div>
    <script>
        var map = L.map('map').fitWorld();
        // L.map('map').setView(e.latlng, 13).addTo(map);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    // attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibmdoaWEyMzExIiwiYSI6ImNrN3B0aGpnNjBuaGYzbW1pcnphOHY0ZW4ifQ.DJKI6Ck_xfaja3RDUPmCfQ'
}).addTo(map);
map.locate({setView: true, maxZoom: 16});

//lấy vị trí cty
var marker = L.marker([10.0310059,105.7513944]).addTo(map);


    //vòng tròn
    var circle = L.circle([10.0310059,105.7513944], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 500
}).addTo(map);

var popup = L.popup()
    .setLatLng([10.0310059,105.7513944])
    .setContent("<b>Batdongsancantho</b>")
    .openOn(map);

//text
marker.bindPopup("<b>Batdongsancantho</b>").openPopup();


//gps


function onLocationFound(e) {
    var radius = e.accuracy;

    L.marker(e.latlng).addTo(map)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();

    L.circle(e.latlng, radius).addTo(map);
}

map.on('locationfound', onLocationFound);
function onLocationError(e) {
    alert(e.message);
}

map.on('locationerror', onLocationError);


//click
function onMapClick(e) {
    var circle = L.circle(e.latlng, {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 100
}).addTo(map);
var marker = L.marker(e.latlng).addTo(map);
var popup = L.popup()
    .setLatLng(e.latlng)
    .setContent("Now you chose here.")
    .openOn(map);
    document.getElementById("value").value = e.latlng;
    alert("Now you chose here " + e.latlng);
}

map.on('click', onMapClick);

    </script>


</body>

</html>