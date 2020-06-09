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
<div id="map" style="height:1000px;"></div>
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
    var map = L.map('map').setView([-10.8667, 70.4667], 5);
    var Esri_WorldStreetMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
    });
    Esri_WorldStreetMap.addTo(map);
var Stamen_Watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
	attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	subdomains: 'abcd',
	minZoom: 1,
	maxZoom: 16,
	ext: 'jpg'
});
var Stamen_TonerLabels = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/toner-labels/{z}/{x}/{y}{r}.{ext}', {
	attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	subdomains: 'abcd',
	minZoom: 0,
	maxZoom: 20,
	ext: 'png'
});
//Stamen_Watercolor.addTo(map);
//Stamen_TonerLabels.addTo(map);
var Jawg_Streets = L.tileLayer('https://{s}.tile.jawg.io/jawg-streets/{z}/{x}/{y}{r}.png?access-token={accessToken}', {
	attribution: '<a href="http://jawg.io" title="Tiles Courtesy of Jawg Maps" target="_blank">&copy; <b>Jawg</b>Maps</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	minZoom: 0,
	maxZoom: 22,
	subdomains: 'abcd',
	accessToken: 'TmMeVgqbneXwQsHnFYm3PjohZD1XWvkp3v4gqDOqXc7ATIWNrf5mXIkU5AsCoToI'
});
//Jawg_Streets.addTo(map);

    L.marker([-20.8667, 55.4667]).addTo(map)
        .bindPopup('Ile de la Réunion');
    L.marker([-13.176, 45.137]).addTo(map)
        .bindPopup('Mayotte');
    L.marker([-18.9531, 47.5207]).addTo(map)
        .bindPopup('Madagascar');
    L.marker([-6.1706, 39.3681]).addTo(map)
        .bindPopup('Zanzibar');
    L.marker([-11.7087, 43.2525]).addTo(map)
        .bindPopup('Comores');
    L.marker([-20.463, 57.577]).addTo(map)
        .bindPopup('Ile Maurice');
    L.marker([-4.7024, 55.4494]).addTo(map)
        .bindPopup('Seychelles');
    L.marker([-19.7166638,63.416665]).addTo(map)
        .bindPopup('Rodrigues');

</script>


<style>
	.card {
		border: 1px solid #e0e0e0;
		margin-bottom: 10px;
	}
</style>