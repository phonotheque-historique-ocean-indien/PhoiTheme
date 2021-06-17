<?php
    // Detecting through Session if we are in "partie froide" or "partie chaude"
//    session_start();
//    if(filter_var($_GET["partie"], FILTER_SANITIZE_STRING) == "chaude") {
//        $_SESSION["partie"] = "chaude";
//    }
//    if($_SESSION["partie"] == "chaude") {
//        // This page should be opened only from partie chaude
//        header('Location: /');
//        exit();
//    }
?>
<?php
	session_start();
	if($_SESSION["partie"] == "chaude" && $_GET["partie"] != "froide"):
?>
<h2>Les partenaires</h2>
<?php endif; ?>
</div>
<div style="position:relative;">
<div id="map" style="height:1000px;z-index:0;"></div>
<div id="notes" style="position:absolute; right:50px;top:50px;height:150px;width:40%;z-index:12000;padding:20px;border-radius: 6px;">
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Nom sélectionné :
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                <ul>
                    <li>Objets de collectage (72)</li>
                    <li>Personnes (23)</li>
                    <li>Oeuvres (61)</li>
                    <li>Groupes (38)</li>
                    <li>Livres / Articles / Photos / Autres (47)</li>
                    <li>Médias (138)</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                Description:
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                (Description du lieu sélectionné)
            </div>
        </div>
    </div>
</div>
</div>
<div class="container">

    <style>
        @import url("https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css");
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.10.1/leaflet-providers.min.js"></script>



<script>
var Esri_WorldStreetMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
    attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
    });

var mapBounds = new L.LatLngBounds(
  new L.LatLng(-43.30690941, 5.8093217),
  new L.LatLng(20.84980396, 98.79856211)
);
var mapMinZoom = 1;
var mapMaxZoom = 10;

var CarteGeologiqueMarcou = L.tileLayer('/carte/{z}/{x}/{y}.png', {
            minZoom: mapMinZoom, maxZoom: mapMaxZoom,
            bounds: mapBounds,
            opacity: 0.85
          });

var Stamen_Watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
	attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	subdomains: 'abcd',
	minZoom: 1,
	maxZoom: 16,
	ext: 'jpg'
});

var map = L.map('map',
{
	center: [-14.8667, 54.4667],
    zoom: 5,
    layers:[Esri_WorldStreetMap, CarteGeologiqueMarcou]
}
);
//L.control.layers().addTo(map);
map.addControl(new L.Control.Layers(null, {"ESRI":Esri_WorldStreetMap, "Carte géologique Marcou":CarteGeologiqueMarcou, "Watercolor":Stamen_Watercolor}, {position:'topleft'}));

    L.marker([-20.8667, 55.4667]).addTo(map)
        .bindPopup('Ile de la Réunion');
    L.marker([-12.760910340467493, 45.1812744140625]).addTo(map)
        .bindPopup('Mayotte');
    L.marker([-18.9531, 47.5207]).addTo(map)
        .bindPopup('Madagascar');
    L.marker([-6.1706, 39.3681]).addTo(map)
        .bindPopup('Zanzibar');
    L.marker([-11.7087, 43.2525]).addTo(map)
        .bindPopup('Comores');
    L.marker([-11.63878618292717, 43.37677001953125]).addTo(map)
        .bindPopup('Ile Maurice');
    L.marker([-4.7024, 55.4494]).addTo(map)
        .bindPopup('Seychelles');
    L.marker([-19.68397023588844,63.33618164062501],{draggable:'true'}).addTo(map)
        .bindPopup('Rodrigues');

function onMapClick(e) {
  marker = new L.marker(e.latlng, {draggable:'true'});
  marker.on('dragend', function(event){
    var marker = event.target;
    var position = marker.getLatLng();
    marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
    map.panTo(new L.LatLng(position.lat, position.lng))
    console.log(position);
  });
  map.addLayer(marker);
};

map.on('click', onMapClick);

</script>


<style>
	.card {
		border: 1px solid #e0e0e0;
		margin-bottom: 10px;
	}
</style>
