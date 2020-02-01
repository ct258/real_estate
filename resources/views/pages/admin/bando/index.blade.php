<!--
  Code By Seth Phat
  https://sethphat.com
-->
<html>

<head>
    <meta charset="utf-8" />
    <title>LeafletJS - OpenStreetMap API by Seth Phat</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
        integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
        integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
        crossorigin=""></script>
    <style>
        #sethPhatMap {
            width: 100%;
            height: 100%;
        }

        .map-popup-content {
            width: 300px;
        }

        .map-popup-content .left {
            float: left;
            width: 40%;
        }

        .map-popup-content .left img {
            width: 100%;
            height: 100px;
            margin: -15px 0 -15px -20px;
            border-radius: 12px;
        }

        .map-popup-content .right {
            float: left;
            width: 60%;
        }

        .clearfix {
            clear: both;
        }
    </style>
</head>

<body>
    <div id="sethPhatMap"></div>
</body>

<script>
    var mapObj = null;
	var defaultCoord = [10.0282573, 105.7676503]; // coord mặc định, 9 giữa HCMC
	var zoomLevel = 13;
	var mapConfig = {
		attributionControl: false, // để ko hiện watermark nữa, nếu bị liên hệ đòi thì nhớ open nha
		center: defaultCoord, // vị trí map mặc định hiện tại
		zoom: zoomLevel, // level zoom
	};
	
	window.onload = function() {
		// init map
		mapObj = L.map('sethPhatMap', mapConfig);
		
		// add tile để map có thể hoạt động, xài free từ OSM
		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(mapObj);
		
		// tạo marker
		var popupOption = {
		  	className: "map-popup-content",
		};
		var marker = addMarker([10.0282573, 105.7676503], `<div class='left'><img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1SGNN50inDZcOweium4llf4qacFBFgBK9sXW7fxQ_lBm6-Abcww' /></div><div class='right'><b>Đây có gì hot?</b><br>Một Popup có 1 cô gái tên là Lailah</div><div class='clearfix'></div>`, popupOption);
	};
	
	function addMarker(coord, popupContent, popupOptionObj, markerObj) {
		if (!popupOptionObj) {
			popupOptionObj = {};
		}
		if (!markerObj) {
			markerObj = {};
		}
		
		var marker = L.marker(coord, markerObj).addTo(mapObj); // chơi liều @@
		var popup = L.popup(popupOptionObj);
		popup.setContent(popupContent);
		
		// binding
		marker.bindPopup(popup);
		
		return marker;
	}	
</script>

</html>