<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_objects_default_html.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013-2018 Whirl-i-Gig
 *
 * For more information visit http://www.CollectiveAccess.org
 *
 * This program is free software; you may redistribute it and/or modify it under
 * the terms of the provided license as published by Whirl-i-Gig
 *
 * CollectiveAccess is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTIES whatsoever, including any implied warranty of 
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
 *
 * This source code is free and modifiable under the terms of 
 * GNU General Public License. (http://www.gnu.org/copyleft/gpl.html). See
 * the "license.txt" file for details, or visit the CollectiveAccess web site at
 * http://www.CollectiveAccess.org
 *
 * ----------------------------------------------------------------------
 */

	$t_repr = 			$this->getVar("item");
	//$t_repr = new ca_object_representations();
	$va_comments = 			$this->getVar("comments");
	$va_tags = 				$this->getVar("tags_array");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$vn_id =				$t_repr->get('ca_object_representations.representation_id');
	$mimetype = $t_repr->getMediaInfo("ca_object_representations.media")["INPUT"]["MIMETYPE"];

	MetaTagManager::addMetaProperty("og:url", "https://www.phoi.io/index.php/Detail/representations/".$vn_id);
	MetaTagManager::addMetaProperty("og:type", "website");
	
?>
<h2>Lien partageable</h2>

<div class="columns">
	<div class="column">
	<?php	
	switch($mimetype) {
		case "audio/x-wav":
		case "audio/mpeg":
?>
			<p>{{{<unit relativeTo="ca_objects.parent"><l><img src='^ca_object_representations.media.pagewatermark.url' style='width:400px;'/></l></unit>}}}</p>
			<p>{{{<unit relativeTo="ca_objects"><unit relativeTo="ca_objects.parent"><l>^ca_objects.preferred_labels</l></unit> > ^ca_objects.preferred_labels</unit>}}}</p>
<?php			
	$description = $t_repr->getWithTemplate("<unit relativeTo='ca_objects'><unit relativeTo='ca_objects.parent'>^ca_objects.preferred_labels (^ca_objects.format)</unit> > ^ca_objects.preferred_labels</unit>");
	MetaTagManager::addMetaProperty("og:description", $description);
	$title = "⏯ phoi.io : ".str_replace("\n"," ",$t_repr->getWithTemplate("<unit relativeTo='ca_objects'>^ca_objects.preferred_labels</unit>"));
	MetaTagManager::setWindowTitle($title);
	MetaTagManager::addMetaProperty("og:title", $title);
	MetaTagManager::addMetaProperty("og:image:alt", $title);
	MetaTagManager::addMetaProperty("og:image", $t_repr->getWithTemplate("<unit relativeTo='ca_objects.parent'>^ca_object_representations.media.pagewatermark.url </unit>"));
			
			break;
		case "image/jpeg":
		default:			
?>
			<p>{{{<unit relativeTo="ca_objects" restrictToTypes='Album'><l><img src='^ca_object_representations.media.pagewatermark.url' style='width:400px;'/></l></unit>}}}</p>
			<p>{{{<unit relativeTo="ca_objects" restrictToTypes="Album"><l>^ca_objects.preferred_labels</l>}}}</p>

<?php		
	$description = $t_repr->getWithTemplate("<unit relativeTo='ca_objects' restrictToTypes='Album'>Image : ^ca_objects.preferred_labels (^ca_objects.format)</unit>");
	MetaTagManager::addMetaProperty("og:description", $description);
	$title = "📷 phoi.io : ".str_replace("\n"," ",$t_repr->getWithTemplate("<unit relativeTo='ca_objects' restrictToTypes='Album'>Image : ^ca_objects.preferred_labels</unit>"));
	MetaTagManager::setWindowTitle($title);
	MetaTagManager::addMetaProperty("og:title", $title);
	MetaTagManager::addMetaProperty("og:image:alt", $title);
	MetaTagManager::addMetaProperty("og:image", $t_repr->getWithTemplate("<unit relativeTo='ca_objects.parent'>^ca_object_representations.media.pagewatermark.url </unit>"));

	break;
	}
?>		
		
	</div>
	<div class="column">
	<?php if(in_array($mimetype, ["audio/x-wav","audio/mpeg"])) : ?>
		<div class="card mediaplayer">
			<header class="card-header">
				<div class="card-header-title">
					<div class="player-icons">
						<span class="icon has-tooltip-arrow has-tooltip-right" data-tooltip="lecture">
							<i class="mdi mdi-play is-large" onclick="parent.pauseTrack();$('#soundplayer')[0].play();"></i>
						</span>
						<span class="icon has-tooltip-arrow has-tooltip-right" data-tooltip="stop">
							<i class="mdi mdi-stop is-large" onclick="parent.pauseTrack();$('#soundplayer')[0].pause();$('#soundplayer')[0].currentTime = 0"></i>
						</span>
						<span class="icon has-tooltip-arrow has-tooltip-right" data-tooltip="ajouter à la playlist">
							<i class="mdi mdi-playlist-plus is-large" onclick="addToPlaylist()"></i>
						</span>
					</div>
					<div class="column is-three-quarters is-centered">
						<div class="card-header-title player-title" id="soundplayertitle">
							<audio id="soundplayer" src=""></audio>
							<h3 id="titremorceau"></h3>
							<p style="padding-left:10px;" id="timing"><span id="position"></span>/<span id="duration"></span></p>
						</div>
						<progress class="progress is-small" id="soundplayerprogression" value="0" max="100">0%</progress>
					</div>
				</div>
			</header>
			<div class="card-content">
				<div class="content">
	<script>
	var fileobj;
	function upload_file(e, id) {
		console.log(e);
		e.preventDefault();
		fileobj = e.dataTransfer.files[0];
		ajax_file_upload(fileobj, id);
		alert("File uploaded");
	}
	
	function ajax_file_upload(file_obj, id) {
		if(file_obj != undefined) {
			var form_data = new FormData();                  
			form_data.append('file', file_obj);
			$.ajax({
				type: 'POST',
				url: '/index.php/Phoi/Media/UploadPost/id/'+id,
				contentType: false,
				processData: false,
				data: form_data,
				success:function(response) {
					location.reload();
					//$('#selectfile').val('');
				}
			});
		}
	}
	</script>

	<div class="player-list">
		<ul>
									
			<li>
				<div class="card-content-item 
					alreadytrack-card-content-item
					" ondrop=" " ondragover="return false">
					<p class="trackname" data-filename="{{{^ca_object_representations.preferred_labels}}}" data-representation="9499" onclick="loadTrack(\"{{{^ca_objects.preferred_labels}}}\",'{{{^ca_object_representations.media.mp3.url}}}');"> {{{^ca_objects.preferred_labels}}} </p>
					<div class="icon-group">
						03:47
					</div>
				</div>	
					
			</li>
		</ul>
	<script>
		function playlistLoadAndPlay() {
			console.log("playlistLoad");
			parent.loadPlaylist([
				{name:"{{{^ca_objects.preferred_labels}}}",url:"{{{^ca_object_representations.media.mp3.url}}}",image:"{{{<unit relativeTo="ca_objects.parent">^ca_object_representations.media.pagewatermark.url</unit>}}}",artist:"{{{<unit relativeTo="ca_objects"><unit relativeTo="ca_objects.parent">^ca_entities.preferred_labels</unit></unit>}}}", album:"<?php print addslashes($t_repr->getWithTemplate('{{{<unit relativeTo="ca_objects"><unit relativeTo="ca_objects.parent">^ca_objects.preferred_labels</unit></unit>}}}')); ?>"}
			]);
			parent.playTrack();
		}

		function addEndOfPlaylistAndPlay() {
			console.log("playlistLoad");
			parent.addEndOfPlaylist([
				{name:"{{{^ca_objects.preferred_labels}}}",url:"{{{^ca_object_representations.media.mp3.url}}}",image:"{{{<unit relativeTo="ca_objects.parent">^ca_object_representations.media.pagewatermark.url</unit>}}}",artist:"{{{<unit relativeTo="ca_objects"><unit relativeTo="ca_objects.parent">^ca_entities.preferred_labels</unit></unit>}}}", album:"<?php print addslashes($t_repr->getWithTemplate('{{{<unit relativeTo="ca_objects"><unit relativeTo="ca_objects.parent">^ca_objects.preferred_labels</unit></unit>}}}')); ?>"}
			]);
			//parent.playTrack();
		}
		
	</script>

					</div>
				</div>
			</div>
		</div>
	<?php else : ?>		
		<div class="card">
			<header class="card-header">
			<p class="card-header-title">
				<?= $t_repr->getWithTemplate("<unit relativeTo='ca_objects' restrictToTypes='Album'>^ca_objects.preferred_labels</unit>") ?>
			</p>
			</header>
			<div class="card-content">
				<p><b>Format</b> {{{<unit relativeTo='ca_objects' restrictToTypes='Album'>^ca_objects.format</unit>}}}</p>
				<p><b>Description</b> {{{<unit relativeTo='ca_objects' restrictToTypes='Album'>^ca_objects.notes</unit>}}}</p>
			</div>
		</div>
	<?php endif; ?>

	</div>
</div>
<div style="height:120px;"></div>


<script>


function loadTrack(name,url) {

console.log("\""+url+"\"");
if(url && url != " ") {
	$('#titremorceau').text(name);
	$('#soundplayer').attr("src", url.trim());
} else {
	$('#titremorceau').html("<i>Non disponible pour l'écoute</i>");
	$('span#duration').text("0:00");
}

return true;
}
$(document).on("ready", function() {


$('#soundplayer').bind('canplay', function(){
	var minutes = Math.floor(Math.floor(this.duration) / 60);
	var seconds = Math.ceil(Math.floor(this.duration) % 60);
	$('span#duration').text(minutes+":"+(seconds<10 ? "0" : "")+seconds);
});

var audio = document.getElementById('soundplayer');
audio.addEventListener('timeupdate', function () {
	var _currentTime = parseFloat(audio.currentTime);
	var minutes = Math.floor(Math.floor(_currentTime) / 60);
	var seconds = Math.ceil(Math.floor(_currentTime) % 60);
	$('span#position').text(minutes+":"+(seconds<10 ? "0" : "")+seconds);
	var progression = _currentTime/audio.duration *100;
	$('#soundplayerprogression').attr("value", progression);
}, false);

var progressBar = document.querySelector("progress");

progressBar.addEventListener("click", function seek(e) {
	var percent = e.offsetX / this.offsetWidth;
	audio.currentTime = percent * audio.duration;
	progressBar.value = percent / 100;
});

$(".disabled").parent().addClass("piste-non-numerisee").find(".card-content-icon").remove()
$(".disabled").parent().find("a").remove()
$(".track-card-content-item").on("dragenter", function() {
	$(this).addClass('draging');
});

$('.track-card-content-item').on("dragleave", function() {
	$(this).removeClass('draging');
})

$(".alreadytrack-card-content-item").on("dragenter", function() {
	$(this).addClass('nodraging');
});

$('.alreadytrack-card-content-item').on("dragleave", function() {
	$(this).removeClass('nodraging');
})

});
var playlistLoadTrack = function(name, url, image, artist="", album="") {
	//loadTrack(name, url, image=null, artist="", album="")
	if(artist == "") artist="playlist";
	if(album == "") album="Playlist PHOI";
	parent.loadTrack(name, url, image, artist, album);
	parent.playTrack();
}
function addToPlaylist() {
	console.log("addToPlaylist");
	let titre = $('#titremorceau').text();	
	console.log(titre);
	let url = $('#soundplayer').attr("src");
	console.log(url);
	parent.loadTrack(titre, url, "{{{^ca_object_representations.media.preview170.url}}}", "<? $entites ?>", "{{{^ca_objects.preferred_labels}}}");
}
window.setTimeout(function() {
	loadTrack("{{{^ca_objects.preferred_labels}}}",'{{{^ca_object_representations.media.mp3.url}}}');
}, 250);
</script>

<style>

	span[data-tooltip] {
		border-bottom: none;
	}
</style>