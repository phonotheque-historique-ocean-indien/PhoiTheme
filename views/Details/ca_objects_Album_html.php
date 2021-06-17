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

    $t_object = $this->getVar('item');
    //$t_object = new ca_objects(130);
    $va_comments = $this->getVar('comments');
    $va_tags = $this->getVar('tags_array');
    $vn_comments_enabled = $this->getVar('commentsEnabled');
    $vn_share_enabled = $this->getVar('shareEnabled');
    $vn_pdf_enabled = $this->getVar('pdfEnabled');
    $vn_id = $t_object->get('ca_objects.object_id');
    $type = $t_object->getTypeCode();
	$vb_isadmin = $this->request->user->hasGroupRole("admin");

	require_once(__CA_THEME_DIR__."/helpers/mediaHelpers.php");

	error_reporting(E_ERROR);
?>

<script src="/viewer.js"></script><!-- Viewer.js is required -->
<link  href="/viewer.css" rel="stylesheet">
<script src="/jquery-viewer.js"></script>

<!-- ca_objects_Phonogramme_html.php -->
<h1 class="titre-phonogramme">{{{^ca_objects.preferred_labels.name}}}</h1>
<div class="columns">
  <div class="column is-one-third">
	<div class="card infosprincipales">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p('Description'); ?>
	    </p>
          <a href="<?php echo __CA_URL_ROOT__; ?>/index.php/Contribuer/Do/EditForm/table/ca_objects/type/<?php echo $type; ?>/id/<?php echo $vn_id; ?>" class="card-header-icon" aria-label="edit" style="/* display: none; */">
            <span class="icon">
                <i class="mdi mdi-pencil is-large"></i>
            </span>
          </a>
	  </header>
	  <div class="card-content">
	    <div class="content">
	      <b><?php _p('Année'); ?></b> : {{{<ifdef code='ca_objects.date'>^ca_objects.date</ifdef><ifnotdef code='ca_objects.date'>Non renseigné</ifnotdef>}}}<br/>
	      {{{<ifdef code='ca_objects.notes'>
	      <b><?php _p('Description'); ?></b> : 
	      <div class="description_side">
	      ^ca_objects.notes
	      </div>
	      </ifdef>}}}
	    </div>
	  </div>
	</div>

	<div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p('Liste des pressages de cet album'); ?>
	    </p>
	  </header>
	  <div class="card-content">
	    <div class="content">
		    <div class="card-content-item">
				<p>{{{<unit relativeTo="ca_entities" restrictToRelationshipTypes="label">^ca_entities.preferred_labels</unit>}}}, {{{^ca_objects.num_edition}}}, {{{^ca_objects.date}}}</p>
			    <div class="icon-group">
				    <a href="#" class="card-content-icon" aria-label="delete">
					    <span class="icon">
							<i class="mdi mdi-close is-large"></i>
						</span>
				    </a>
				    <a href="#" class="card-content-icon" aria-label="edit">
					    <span class="icon">
							<i class="mdi mdi-pencil is-large"></i>
						</span>
				    </a>
			    </div>
		    </div>
	    </div>
	  </div>
	</div>
	<div class="card">
		<header class="card-header">
			<p class="card-header-title">
			  <?php _p('Informations sur le pressage'); ?>
			</p>
		</header>
		<div class="card-content">
			<div class="content">
				<div class="card-content-item">
					<p>Numéro d'édition : {{{^ca_objects.num_edition}}}</p>
					<div class="icon-group">
						<a href="#" class="card-content-icon" aria-label="delete">
							<span class="icon">
								<i class="mdi mdi-close is-large"></i>
							</span>
						</a>
						<a href="#" class="card-content-icon" aria-label="edit">
							<span class="icon">
								<i class="mdi mdi-pencil is-large"></i>
							</span>
						</a>
					</div>
				</div>
				<div class="card-content-item">
					<p>Label : {{{<unit relativeTo="ca_entities" restrictToRelationshipTypes="label"><l>^ca_entities.preferred_labels</l></unit>}}}</p>
					<div class="icon-group">
						<a href="#" class="card-content-icon" aria-label="delete">
							<span class="icon">
								<i class="mdi mdi-close is-large"></i>
							</span>
						</a>
						<a href="#" class="card-content-icon" aria-label="edit">
							<span class="icon">
								<i class="mdi mdi-pencil is-large"></i>
							</span>
						</a>
					</div>
				</div>
			{{{<ifdef code='ca_objects.dimensions.dimensions_height'>
		    <div class="card-content-item">
				<p>Dimensions : ^ca_objects.dimensions.dimensions_length x ^ca_objects.dimensions.dimensions_width x ^ca_objects.dimensions.dimensions_height</p>
			    <div class="icon-group">
				    <a href="#" class="card-content-icon" aria-label="delete">
					    <span class="icon">
							<i class="mdi mdi-close is-large"></i>
						</span>
				    </a>
				    <a href="#" class="card-content-icon" aria-label="edit">
					    <span class="icon">
							<i class="mdi mdi-pencil is-large"></i>
						</span>
				    </a>
			    </div>
		    </div>
			</ifdef>}}}
		    <div class="card-content-item">
				<p>Date : {{{^ca_objects.date}}}</p>
			    <div class="icon-group">
				    <a href="#" class="card-content-icon" aria-label="delete">
					    <span class="icon">
							<i class="mdi mdi-close is-large"></i>
						</span>
				    </a>
				    <a href="#" class="card-content-icon" aria-label="edit">
					    <span class="icon">
							<i class="mdi mdi-pencil is-large"></i>
						</span>
				    </a>
			    </div>
		    </div>
		    {{{<ifdef code='ca_objects.fabrication'>
		    <div class="card-content-item">
				<p>Fabriqué par : ^ca_objects.fabrication</p>
			    <div class="icon-group">
				    <a href="#" class="card-content-icon" aria-label="delete">
					    <span class="icon">
							<i class="mdi mdi-close is-large"></i>
						</span>
				    </a>
				    <a href="#" class="card-content-icon" aria-label="edit">
					    <span class="icon">
							<i class="mdi mdi-pencil is-large"></i>
						</span>
				    </a>
			    </div>
		    </div>
		    </ifdef>}}}
		    <table class='info_pressage_pistes'>
<?php
                        $children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.children' restrictToTypes='Enregistrement'>^ca_objects.object_id</unit>");
                        $children = explode(';', $children);
                        $template1 = "<tr><td style='border:0;'>!!index!!.	^ca_objects.preferred_labels.name</td><td style='border:0;'>^ca_objects.duree</td></tr>";
						$template2 = "<unit relativeTo='ca_entities' delimiter=' ; '><l>^ca_entities.preferred_labels</l>|^relationship_typename</unit>";
                        $i = 0;
                        foreach ($children as $key => $child_id) {
                            ++$i;
                            $vt_object = new ca_objects($child_id);
                            echo str_replace('!!index!!', $i, $vt_object->getWithTemplate($template1));
							$result2 = $vt_object->getWithTemplate($template2);
							$result2 = explode(" ; ", $result2);
							$results = [];
							foreach($result2 as $res) {
								$res2 = explode("|", $res);
								if(!$res2[0]) continue;
								if(!is_array($results[$res2[0]])) {
									$results[$res2[0]] = [];
								}
								$results[$res2[0]][] = $res2[1];
							}
							print "<tr><td colspan=2 style='padding-left:24px;padding-bottom:4px;'>";
							foreach($results as $auteur=>$fonctions) {
								print $auteur." (".implode(", ", $fonctions).")<br/>";
							} 
							print "</td></tr>";
                        }
?>			    
		    </table>
		    
	    </div>
	  </div>
	</div>
	<div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p('Liste des items phonogrammes de ce pressage'); ?>
	    </p>
	  </header>
	  <div class="card-content">
	    <div class="content">
			<div class="card-content-item">
			<div>
<?php
                        $children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.children'>^ca_objects.object_id</unit>");
                        $children = explode(';', $children);
                        $template1 = "<div style=''><a href='/index.php/Detail/objects/^ca_objects.object_id'>^ca_objects.idno</a></div>";
                        $i = 0;
                        foreach ($children as $key => $child_id) {
                            ++$i;
                            $vt_object = new ca_objects($child_id);
							if($vt_object->get("ca_objects.type_id") == 27) 
                            echo $vt_object->getWithTemplate($template1);
						}
?>				
</div>
				<div class="icon-group">
					<a href="#" class="card-content-icon" aria-label="delete">
						<span class="icon">
							<i class="mdi mdi-close is-large"></i>
						</span>
					</a>
					<a href="#" class="card-content-icon" aria-label="edit">
						<span class="icon">
							<i class="mdi mdi-pencil is-large"></i>
						</span>
					</a>
				</div>
			</div>
	    </div>
	  </div>
	</div>
  </div>

  <div class="column">
    <div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p("Informations sur l'item phonogramme"); ?>
	    </p>
          <a href="<?php echo __CA_URL_ROOT__; ?>/index.php/Contribuer/Do/EditForm/table/ca_objects/type/<?php echo $type; ?>/id/<?php echo $vn_id; ?>" class="card-header-icon" aria-label="edit" style="/* display: none; */">
            <span class="icon">
                <i class="mdi mdi-pencil is-large"></i>
            </span>
          </a>

	  </header>
	  <div class="card-content">
	    <div class="content content-infos-phonogramme">
		    <p>Langue principale : {{{^ca_objects.locale_main}}}</p>
			{{{<p>Label : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="label"><l>^ca_entities.preferred_labels</l></unit></p>
			<p>Auteur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="auteur"><l>^ca_entities.preferred_labels</l></unit></p>
			<p>Compositeur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="compositeur"><l>^ca_entities.preferred_labels</l></unit></p>
			<p>Producteur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="producteur"><l>^ca_entities.preferred_labels</l></unit></p>}}}
			<p>Format : {{{^ca_objects.format}}}</p>
		    {{{<ifdef code="duree"><p>Durée : ^ca_objects.duree</p></ifdef>}}}
		    {{{<ifdef code="creation_couv"><p>Création maquette : ^ca_objects.creation_couv</p></ifdef>}}}
			<p>Genre : {{{^ca_objects.genre}}}</p>		    
		    {{{<ifdef code="auteur_textes"><p>Auteur des textes : ^ca_objects.auteur_textes</p></ifdef>}}}
	    </div>
	  </div>
	</div>

	<div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p('Tags'); ?>
	    </p>
	  </header>
	  <div class="card-content" style="">
	    <div class="content">
		    <uL>
			    {{{<unit relativeTo='ca_objects.tag' delimiter=' '>
			    	<li style='display:inline-block;'>
			    	<div class="card-content-item">
					<p class="tag"><a href="/index.php/Thesaurus/View/Index?tag=<?= $t_object->get("ca_objects.tag")?>">^ca_objects.tag</a></p>
						<div class="icon-group">
							<a href="#" class="card-content-icon" aria-label="delete">
								<span class="icon">
									<i class="mdi mdi-close is-large"></i>
								</span>
							</a>
							<a href="#" class="card-content-icon" aria-label="edit">
								<span class="icon">
									<i class="mdi mdi-pencil is-large"></i>
								</span>
							</a>
						</div>
					</div>
			    </li>
			    </unit>}}}
		    </uL>
	    </div>
	  </div>
	</div>


	<div class="card mediaplayer">
	  	<header class="card-header">
			<div class="card-header-title">
				<div class="player-icons">
					<span class="icon">
						<i class="mdi mdi-play is-large" onclick="$('#soundplayer')[0].play();"></i>
					</span>
					<span class="icon">
						<i class="mdi mdi-stop is-large" onclick="$('#soundplayer')[0].pause();$('#soundplayer')[0].currentTime = 0"></i>
					</span>
					<span class="icon">
						<i class="mdi mdi-playlist-plus is-large" onclick="addToPlaylist()"></i>
					</span>
					<span class="icon">
						<i class="mdi mdi-skip-previous is-large has-text-grey-light"></i>
					</span>
					<span class="icon">
						<i class="mdi mdi-skip-next is-large has-text-grey-light"></i>
					</span>
				</div>
				<div class="column is-three-quarters is-centered">
					<div class="card-header-title player-title" id="soundplayertitle">
                        <audio id="soundplayer" src></audio>
						<h3 id="titremorceau"></h3>
						<p id="timing"><span id="position">0:00</span>/<span id="duration">0:00</span></p>
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
					<button class="button is-primary is-small is-info is-light" onclick="playlistLoadAndPlay()"><i class="mdi mdi-play is-large"></i> Ecouter tout maintenant</button>
					<button class="button is-primary is-small is-info is-light" onclick="playlistLoad()"><i class="mdi mdi-chevron-double-down is-large"></i> Ecouter tout ensuite</button>
					<button class="button is-primary is-small is-info is-light" onclick="addEndOfPlaylistAndPlay()"><i class="mdi mdi-playlist-plus is-large"></i> Ajouter à ma playlist</button>
					
					<ol type="1">
                        <?php
                        $children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.children' restrictToTypes='Enregistrement'>^ca_objects.object_id</unit>");
                        $num_media = sizeof($children);
                        $children = explode(';', $children);
                        $template =
"
<li>
	<ifnotdef code='ca_object_representations.media.mp3.url'><div class='disabled'></ifnotdef>
	<div class='card-content-item 
		<ifnotdef code=\"ca_object_representations.media.mp3.url\">track-card-content-item</ifnotdef> 
		<ifdef code=\"ca_object_representations.media.mp3.url\">alreadytrack-card-content-item</ifdef>
		'
		ondrop='<ifnotdef code=\"ca_object_representations.media.mp3.url\">upload_file(event, ^ca_objects.object_id)</ifnotdef> '
		ondragover='return false'>
		<p class='trackname' data-filename='^ca_object_representations.preferred_labels' data-representation='^ca_object_representations.representation_id' onclick='loadTrack(\"^ca_objects.preferred_labels.name\",\"^ca_object_representations.media.mp3.url \");'><ifdef code='face'><span class=\"tag is-light\">^ca_objects.face</span></ifdef> ^ca_objects.preferred_labels.name !!SAMPLE_BUTTON!!</p>
		<div class='icon-group'>
			^ca_objects.duree
			<a href='#' class='card-content-icon' aria-label='info'>
				<span class='icon'>
					<i class='trackname-info mdi mdi-information is-large'></i>
				</span>
			</a>
		</div>
	</div>	
	<ifnotdef code='ca_object_representations.media.mp3.url'></div></ifnotdef>	
</li>";
						if($vb_isadmin) {
							$template = str_replace("!!SAMPLE_BUTTON!!", "<a href='".__CA_URL_ROOT__."/index.php/AudioSample/Object/Clone/id/^ca_objects.object_id' class='keep-sample'>EXTRAIT 30s</a>", $template);
						} else {
							$template = str_replace("!!SAMPLE_BUTTON!!", "", $template);
						}
                        foreach ($children as $key => $child_id) {
                            $vt_object = new ca_objects($child_id);
                            echo $vt_object->getWithTemplate($template);
                        }
                        ?>

					</ol>
<script>
	function playlistLoadAndPlay() {
		console.log("playlistLoad");
        parent.loadPlaylist([
            <?php
			$children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.children' restrictToTypes='Enregistrement'>^ca_objects.object_id</unit>");
			$num_media = sizeof($children);
			$children = explode(';', $children);
			$children = array_reverse($children, true);
            foreach ($children as $key => $child_id) {
				$vt_object = new ca_objects($child_id);
				//echo $vt_object->getWithTemplate($template);
				$media_url = $vt_object->getWithTemplate("^ca_object_representations.media.mp3.url");
				if(!$media_url) continue;
				print "{name:\"".$vt_object->getWithTemplate("^ca_objects.preferred_labels.name")."\",url:\"".addslashes($media_url)."\",image:\"".$t_object->getWithTemplate("^ca_object_representations.media.large.url")."\",artist:\"".$vt_object->getWithTemplate("<unit relativeTo='ca_entities' restrictToRelationshipTypes='interprete'>^ca_entities.preferred_labels</unit>")."\", album:\"{{{^ca_objects.preferred_labels.name}}}\"},\n";
			}
            ?>
        ]);
		parent.playTrack();
    }

	function addEndOfPlaylistAndPlay() {
		console.log("playlistLoad");
        parent.addEndOfPlaylist([
            <?php
			$children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.children' restrictToTypes='Enregistrement'>^ca_objects.object_id</unit>");
			$num_media = sizeof($children);
			$children = explode(';', $children);
			//$children = array_reverse($children, true);
            foreach ($children as $key => $child_id) {
				$vt_object = new ca_objects($child_id);
				//echo $vt_object->getWithTemplate($template);
				$media_url = $vt_object->getWithTemplate("^ca_object_representations.media.mp3.url");
				if(!$media_url) continue;
				print "{name:\"".$vt_object->getWithTemplate("^ca_objects.preferred_labels.name")."\",url:\"".addslashes($media_url)."\",image:\"".$t_object->getWithTemplate("^ca_object_representations.media.large.url")."\",artist:\"".$vt_object->getWithTemplate("<unit relativeTo='ca_entities' restrictToRelationshipTypes='interprete'>^ca_entities.preferred_labels</unit>")."\", album:\"{{{^ca_objects.preferred_labels.name}}}\"},\n";
			}
            ?>
        ]);
		//parent.playTrack();
    }
	
</script>



				</div>
				<!-- TODO : afficher uniquement si logué -->
				<a href="/index.php/Contribuer/Do/Form/table/ca_objects/type/Enregistrement/parent_id/<?= $vn_id ?>"><button class="button is-primary">Ajouter une piste</button></a><span style="line-height:40px;"> ou glisser un fichier audio sur une piste</span>
			</div>
	  	</div>
	</div>
	<div class="card medias">
	  <header class="card-header">
	    <p class="card-header-title">
	      <!-- <?php echo $t_object->getRepresentationCount(["checkAccess"=>1]); ?> --><?php _p('Médias attachés'); ?>
	    </p>
          <div class="icon-group">
          </div>
	  </header>
	  <div class="card-content">
	    <div class="content">
			<div id="fileselector">
				<div class="file is-primary is-small">
					<label class="file-label">
						<input class="file-input" type="file" name="resume">
						<span class="file-cta">
						<span class="file-icon">
							<i class="fas fa-upload"></i>
						</span>
						<span class="file-label">
							Parcourir
						</span>
						</span>
					</label>
				</div>
			</div>
			<div id="imageviewer">
				<?php RenderDropzone($t_object); ?>
			</div>
	    </div>
	  </div>
	</div>

  </div>
</div>
<div id="bottomDetail"></div>
<script>
$(function() {
    $.contextMenu({
        selector: '.trackname', 
		zIndex: 100,
        callback: function(key, options) {
            let filename = $(this).parent().find('.trackname').data("filename");
            let repr_id = $(this).parent().find('.trackname').data("representation");

            var m = "clicked: " + key;
            if(key == "quit") {
				return;
			} else if(key == "apercu") {
			} else if(key == "protocole") {
				$('#protocol-filename').html(filename.replace(/(PNAP_[0-9](\.[0-9])?)/,"<b>$1</b>"));
                  let protocol = filename.replace(/.*(PNAP_[0-9](\.[0-9])?).*/,"$1");
                  $('#protocol-link a').attr('href', '/phoi-protocoles/'+protocol+'.pdf');
                  $('#modal-protocol').addClass('is-active');
			} else if(key == "details") {
				$.get('https://<?= __CA_SITE_HOSTNAME__; ?>/<?= __CA_URL_ROOT__; ?>index.php/Phoi/Media/DetailAudioInfos/id/'+repr_id+'/name/'+filename, function( data ) {
					$("#details-content").html( data);
				});
				$('#modal-details').addClass('is-active');
			} else if(key == "signaler un abus") {
			} else if(key == "Télécharger") {
			} else if(key == "principal") {
			} else if(key == "publier") {
			} else if(key == "lien") {
			} else {
        	    window.console && console.log(m) || alert(m);     
			}
        },
        items: {
            "apercu": {name: "Aperçu", icon: "fas fa-search"},
            "lien": {name: "Obtenir le lien partageable", icon: "fas fa-link"},
            "details": {name: "Afficher les détails", icon: "fas fa-info"},
            "protocole": {name: "Protocole de numérisation", icon: "fas fa-barcode"},
            "principal": {name: "Définir comme image principale", icon: "fas fa-medal"},
            "publier": {name: "Public", icon: "fas fa-eye"},
            "Télécharger": {name: "Télécharger", icon: "fas fa-download"},
            "signaler un abus": {name: "Signaler un abus", icon: "fas fa-angry"},
            "Supprimer": {name: "Supprimer", icon: "fas fa-trash"},
            "sep1": "---------",
            "quit": {name: "Fermer", icon: "fas fa-times"}
        }
    });

	// the "i" icon
	$.contextMenu({
        selector: '.trackname-info', 
        trigger: 'left',
        callback: function(key, options) {
            let filename = $(this).find('.dz-filename span').text();
            let path = $(this).find('.dz-image img').attr('src');
            let repr = path.split(/[\\/]/).pop();
            repr = repr.replace(/_pagewatermark\.jpg/,'');
            repr_id = repr.split(/_/).pop();

            var m = "clicked: " + key;
            if(key == "quit") {
				return;
			} else if(key == "apercu") {
			} else if(key == "protocole") {
				$('#protocol-filename').html(filename.replace(/(PNIP_[0-9](\.[0-9])?)/,"<b>$1</b>"));
				let protocol = filename.replace(/.*(PNIP_[0-9](\.[0-9])?).*/,"$1");
				$('#protocol-link a').attr('href', '/phoi-protocoles/'+protocol+'.pdf');
				$('#modal-protocol').addClass('is-active');
			} else if(key == "details") {
			} else if(key == "signaler un abus") {
			} else if(key == "Télécharger") {
			} else if(key == "publier") {
			} else if(key == "lien") {
			} else {
        	    window.console && console.log(m) || alert(m);     
			}
        },
        items: {
            "apercu": {name: "Aperçu", icon: "fas fa-search"},
            "lien": {name: "Obtenir le lien partageable", icon: "fas fa-link"},
            "details": {name: "Afficher les détails", icon: "fas fa-info"},
            "protocole": {name: "Protocole de numérisation", icon: "fas fa-barcode"},
            "publier": {name: "Public", icon: "fas fa-eye"},
            "Télécharger": {name: "Télécharger", icon: "fas fa-download"},
            "signaler un abus": {name: "Signaler un abus", icon: "fas fa-angry"},
            "Supprimer": {name: "Supprimer", icon: "fas fa-trash"},
            "sep1": "---------",
            "quit": {name: "Fermer", icon: "fas fa-times"}
        }
    });
});
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
		
		$(".disabled").parent().addClass("piste-non-numerisee");

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
		parent.loadTrack(titre, url, "{{{^ca_object_representations.media.large.url}}}", "{{{<unit relativeTo='ca_entities'>^ca_entities.preferred_labels.displayname</unit>}}}", "{{{^ca_objects.preferred_labels}}}");
	}
</script>

<style>
	.card {
		border:1px solid #e0e0e0;
		margin-bottom:10px;
	}
	.infosprincipales {
	    max-height: 350px;
		overflow-y: scroll;
	}
	/***** MODIFS RACHEL *****/
	.card-content {
		padding: 1.5rem;
	}

	.card-cover-icon {
		z-index: 99;

	}
  	/***** FIN MODIFS RACHEL *****/
  	h1.titre-phonogramme {
		text-align: center;
		font-weight: 100;
	    font-size: 1.8em;
	    padding-top: 1em;
	    padding-bottom: 0.5em;
	}
	.list-items .card {
		width: 220px;
		display:inline-block;
	}
	.content figure {
		margin:0;
	}
	.card .media:not(:last-child) {
		margin-bottom:0.5rem;
	}
	/***** MODIFS RACHEL *****/
	.content ul {
		list-style: none;
		margin: 0 !important;
	}

	.content ol {
		margin: 1.5rem;
		line-height: 2rem;
	}

	.player-title {
		display: flex;
		justify-content: space-between;
	}

	.card-header-title {
		align-items: baseline !important;
		justify-content: space-between;
	}

	.card-content-item {
		display: flex;
		align-items: stretch;
		justify-content: space-between;
	}

	.card-content-item p{
		margin: 0 !important;
	}

	.cover {
		position: relative;
		max-width: 120px;
		z-index: 0;
	}

	.card-cover-icon {
		position: absolute;
		right: 0;
		top: 0;
		z-index: 1;
	}

	.player-covers {
		margin-top: 1rem;
		display: flex;
		flex-direction: row;
		justify-content: space-around;
	}

	.tab {
		display: inline-flex;
		align-items: center;
		justify-content: center;
		line-height: 1.5rem;
		padding : 2rem;
		height: 2em;
		color: #EFEFEF;
		text-transform: uppercase;
	}

	.tag:link {
		background-color: #BFD7E3 !important;
		border-radius: 2px !important;
		color: #232425;
		border-bottom: 0.1rem solid #232425;
	}

	.tab:hover {
		color: #232425;
		background-color: #EFEFEF;
		border-bottom: none;
		padding : 2rem;
		cursor: pointer;
	}

	.tab:active {
		color: #232425;
		border-bottom: 0.1em solid #232425;
	}

	.is-active {
		color: #232425;
		border-bottom: 0.1em solid #232425;
	}

    .medias .card-content .content {
        padding-bottom:15px;
    }
    .medias .card-content .content img {
    }

	/****** FIN MODIFS RACHEL ****/
	#soundplayertitle {
		padding-left: 0;
		padding-right: 0;
	}
	
	.description_side {
		padding-left:8px;
	}
	.description_side h1,
	.description_side h2,
	.description_side h3 {
		font-weight: bold;
		font-size:1em;
		margin:0;
		padding:0;
		color:#777;
	}
	.content .description_side table td, .content .description_side table th {
		padding:0.1em 0.1em
	}
	.content-infos-phonogramme p {
		margin-bottom:0 !important;
	}
	
	.content table.info_pressage_pistes td, .content table.info_pressage_pistes th,
	.description_side {
		font-size:0.8em;
	}
	.piste-non-numerisee,
	.piste-non-numerisee .card-content-item,
	.piste-non-numerisee .card-content-item .tag.is-light {
		color:gray;
	}
	.player-list .piste-non-numerisee .card-content-item {
		cursor:not-allowed;
	}
	
	.infosprincipales {
		max-height: 600px;
	}
	.keep-sample {
		background-color: #7dafca;
		color: white;
		padding: 2px 5px;
		font-size: 0.6em;
		border-radius: 2px;
	}
	#fileselector {
		margin-bottom:10px;
	}
	#fileselector .file {
		justify-content: flex-end;
	}
	.track-card-content-item.draging {
		border-radius:4px;
		background-color:rgba(4, 209, 178, 1.00);
		color:white;
	}
	.alreadytrack-card-content-item.nodraging {
		border-radius:4px;
		background-color:rgba(229, 103, 95, 1.00);
		color:white;
	}
	.content table.info_pressage_pistes td, 
	.content table.info_pressage_pistes th {
		padding:0.08em;
	}
</style>