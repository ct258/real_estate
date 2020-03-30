<html>

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin="">
    </script>
    <link rel="stylesheet" href="{{asset('map/css/TripgoRouting.css')}}" />
    <script src="{{asset('map/dist/TripgoRouting.js')}}"></script>
    <script src="{{asset('map/lib/jquery-3.2.1.js')}}"></script>
    <script src="{{asset('map/lib/Polyline.encoded.js')}}"></script>

</head>

<body>
    <div id="map"></div>
    <script>
        let options ={
              "tripgoApiKey": "e03d67ee67971d70908108f636f439ed",
              "mapId" : "map",
              "googleTile": true,
              "mapCenter" : {
                "lat": 10.036200,
                "lng": 105.788033
              },
              "floatPanel": false,
          }
          L.tripgoRouting.mapLayer.initialize(options);
    </script>

    {{-- <a href="https://github.com/skedgo/tripkit-leaflet" target="_blank">
        <img style="position: absolute; top: 0; right: 0; border: 0; z-index:1500"
            src="https://camo.githubusercontent.com/e7bbb0521b397edbd5fe43e7f760759336b5e05f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677265656e5f3030373230302e706e67"
            alt="Fork me on GitHub"
            data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png">
    </a> --}}
</body>

</html>