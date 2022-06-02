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
	$vb_islogged = $this->request->user->getUserId();
	require_once(__CA_THEME_DIR__."/helpers/mediaHelpers.php");
	error_reporting(E_ERROR);


?>

<script src="/viewer.js"></script><!-- Viewer.js is required -->
<link  href="/viewer.css" rel="stylesheet">
<script src="/jquery-viewer.js"></script>
<?php
// sanitize page name for browse tab
$browser_tab_label = $t_object->get('ca_objects.preferred_labels.name');
$browser_tab_label = str_replace(["\n","\t"], "", $browser_tab_label);
$browser_tab_label = str_replace("'", "‘", $browser_tab_label);
?>
<script>
	window.parent.history.pushState('', "<?= $browser_tab_label ?>", 'https://www.phoi.io/index.php/Detail/objects/<?= $vn_id ?>');
	window.parent.document.title = "<?= $browser_tab_label ?>";
</script>
<!-- ca_objects_Phonogramme_html.php -->
<h1 class="titre-phonogramme">
	<?php 
		$parent = $t_object->getWithTemplate("^ca_objects.parent.preferred_labels.name");
		if($parent) {
			print $parent;
		} else {
			print $t_object->getWithTemplate("^ca_objects.preferred_labels.name");
		}
	?>
</h1>
<div class="columns">
  <div class="column is-one-fifth">
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
	      <b><?php _p('Année'); ?></b> : {{{<ifdef code='ca_objects.parent.date'>^ca_objects.parent.date</ifdef><ifnotdef code='ca_objects.parent.date'>Non renseigné</ifnotdef>}}}<br/>
	      {{{<ifdef code='ca_objects.parent.notes'>
	      <b><?php _p('Description'); ?></b> : 
	      <div class="description_side" style="white-space:pre-wrap; word-wrap:break-word;">^ca_objects.parent.notes</div>
	      </ifdef>}}}
	    </div>
	  </div>
	</div>
{{{<ifdef code="ca_objects.Pressage">
	<div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p('Liste des pressages de cet album'); ?>
	    </p>
	  </header>
	  <div class="card-content">
	    <div class="content">
		    <div class="card-content-item" style="display:block;">
<?php
$ref_pressage = $t_object->get("ca_objects.Pressage");
$refs_pressage = explode("/", $ref_pressage);
$o_data = new Db();
$qr_result = $o_data->query('select value_longtext1, row_id, object_id, parent_id from ca_attribute_values cav left join ca_attributes ca on ca.attribute_id=cav.attribute_id left join ca_objects cao on cao.object_id=ca.row_id  where cav.value_longtext1 like "'.$refs_pressage[0].'/%" and cav.element_id=96 group by parent_id' );
$i = 1;
while($qr_result->nextRow()) {
	print "<a href='/index.php/Detail/objects/".$qr_result->get("object_id")."'>Pressage {$i}</a><br/>\n";
	$i++;
}
?>

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
}}}	
<div class="card">
		<header class="card-header">
			<p class="card-header-title">
			  <?php _p('Informations sur le pressage'); ?>
			</p>
		</header>
		<div class="card-content">
			<div class="content">
				<div class="card-content-item">
					<p>Numéro d'édition : {{{^ca_objects.parent.num_edition}}}</p>
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
					<p>Label : {{{<unit relativeTo="ca_objects.parent"><unit relativeTo="ca_entities" restrictToRelationshipTypes="label"><l>^ca_entities.preferred_labels</l></unit></unit>}}}</p>
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
                        $children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.parent'><unit relativeTo='ca_objects.children' restrictToTypes='Enregistrement'>^ca_objects.object_id</unit></unit>");
                        $children = explode(';', $children);
                        $template1 = "<tr><td style='border:0;' class='partie_titre'>
							<div style='display:inline-block;float:left;margin-right:4px;'>
							<ifdef code='ca_objects.face'><span class='tag is-white face'>Face ^ca_objects.face</span></ifdef>
							<ifdef code='ca_objects.num_piste'><span class='tag is-light piste'>^ca_objects.num_piste</span></ifdef> 
							</div>
							<span class='tag is-white'><l>^ca_objects.preferred_labels.name</l></span>
						</td>
						<td style='border:0;'>^ca_objects.duree</td>
						<td style='border:0'>
							<a href='/index.php/Contribuer/Do/EditForm/table/ca_objects/type/Enregistrement/id/^ca_objects.object_id' class='card-header-icon' aria-label='edit'>
								<span class='icon'>
									<i class='mdi mdi-pencil is-large'></i>
								</span>
							</a>
					  	</td></tr>";
						$template2 = "<unit relativeTo='ca_entities' delimiter=' ; '><l>^ca_entities.preferred_labels</l>|^relationship_typename</unit>";
                        $i = 0;
                        foreach ($children as $key => $child_id) {
                            ++$i;
                            $vt_object = new ca_objects($child_id);
							//$temp = str_replace('!!index!!', $i, $vt_object->getWithTemplate($template1));
							$temp = $vt_object->getWithTemplate($template1);
                            echo $temp;
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
                        $children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.parent'><unit relativeTo='ca_objects.children'>^ca_objects.object_id</unit></unit>");
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

  <div class="column is-three-fifths">
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
					<p class="tag"><a href="/index.php/Thesaurus/View/Index">^ca_objects.tag</a></p>
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


    <div class="card">
	  <footer class="card-footer" style="border-bottom:1px solid #eeeeee;">
	  <?php
                        $children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.parent'><unit relativeTo='ca_objects.children'>^ca_objects.object_id</unit></unit>");
                        $children = explode(';', $children);
                        $template1 = "<a class='card-footer-item' href='/index.php/Detail/objects/^ca_objects.object_id'>^ca_objects.idno</a>";
                        $i = 0;
                        foreach ($children as $key => $child_id) {
                            ++$i;
                            $vt_object = new ca_objects($child_id);
							if($vt_object->get("ca_objects.type_id") == 27) 
                            echo $vt_object->getWithTemplate($template1);
						}
?>			  
  		</footer>

	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p("Informations sur l'item phonogramme"); ?> {{{^ca_objects.idno}}}
	    </p>
          <a href="<?php echo __CA_URL_ROOT__; ?>/index.php/Contribuer/Do/EditForm/table/ca_objects/type/<?php echo $type; ?>/id/<?php echo $vn_id; ?>" class="card-header-icon" aria-label="edit" style="/* display: none; */">
            <span class="icon">
                <i class="mdi mdi-pencil is-large"></i>
            </span>
          </a>

	  </header>
	  <div class="card-content">
	    <div class="content content-infos-phonogramme">
			{{{<unit relativeTo="ca_objects.parent"><p>Langue principale : ^ca_objects.locale_main</p>
				
			<unit relativeTo="ca_entities" restrictToRelationshipTypes="auteur"><p>Auteur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="auteur"><l>^ca_entities.preferred_labels</l></unit></p></unit>
			<unit relativeTo="ca_entities" restrictToRelationshipTypes="compositeur"><p>Compositeur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="compositeur"><l>^ca_entities.preferred_labels</l></unit></p></unit>
			<unit relativeTo="ca_entities" restrictToRelationshipTypes="producteur"><p>Producteur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="producteur"><l>^ca_entities.preferred_labels</l></unit></p></unit>
			<p>Format : ^ca_objects.format</p>
		    <ifdef code="duree"><p>Durée : ^ca_objects.duree</p></ifdef>
		    <ifdef code="creation_couv"><p>Création maquette : ^ca_objects.creation_couv</p></ifdef>
		    <ifdef code="auteur_textes"><p>Auteur des textes : ^ca_objects.auteur_textes</p></ifdef></unit>

			<p>Langue principale : ^ca_objects.locale_main</p>
				
			<unit relativeTo="ca_entities" restrictToRelationshipTypes="auteur"><p>Auteur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="auteur"><l>^ca_entities.preferred_labels</l></unit></p></unit>
			<unit relativeTo="ca_entities" restrictToRelationshipTypes="compositeur"><p>Compositeur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="compositeur"><l>^ca_entities.preferred_labels</l></unit></p></unit>
			<unit relativeTo="ca_entities" restrictToRelationshipTypes="producteur"><p>Producteur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="producteur"><l>^ca_entities.preferred_labels</l></unit></p></unit>
		    <ifdef code="duree"><p>Durée : ^ca_objects.duree</p></ifdef>
			<ifdef code="pays_liste"><p>Pays : ^ca_objects.pays_liste</p></ifdef>
		    <ifdef code="creation_couv"><p>Création maquette : ^ca_objects.creation_couv</p></ifdef>
			<p>Genre : ^ca_objects.genre</p>		    
			<p>Fonds : <unit relativeTo="ca_entities" restrictToRelationshipTypes="fonds"><l>^ca_entities.preferred_labels</l></unit></p>		    			    
			<p>N° support : ^ca_objects.num_disque</p>		    
			<p>Pressage : ^ca_objects.Pressage</p>		    
		    <ifdef code="auteur_textes"><p>Auteur des textes : ^ca_objects.auteur_textes</p></ifdef>
			}}}
	    </div>
	  </div>
	</div>

	<div class="card mediaplayer">
	  	<header class="card-header">
			<div class="card-header-title">
				<div class="player-icons">
					<span class="icon has-tooltip-arrow has-tooltip-right" data-tooltip="lecture">
						<i class="mdi mdi-play is-large has-text-grey-light" onclick="window.parent.pauseTrack();$('#soundplayer')[0].play();"></i>
					</span>
					<span class="icon has-tooltip-arrow has-tooltip-right" data-tooltip="stop">
						<i class="mdi mdi-stop is-large has-text-grey-light" onclick="window.parent.pauseTrack();$('#soundplayer')[0].pause();$('#soundplayer')[0].currentTime = 0"></i>
					</span>
					<span class="icon has-tooltip-arrow has-tooltip-right" data-tooltip="ajouter à la playlist">
						<i class="mdi mdi-playlist-plus is-large has-text-grey-light" onclick="addToPlaylist()"></i>
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
<?php
// FONCTIONS D'UPLOAD EN AJAX DES FICHIERS
?>				
<script>
var fileobj;
function upload_file(e, id) {
	console.log(e);
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj, id);
	//alert("File uploaded");
	$("body").append('<div class="modal is-active"><div class="modal-background"></div><div class="modal-content" style="z-index:5000;background-color:white;padding:70px;position:absolute;top:240px;width:300px;margin:auto;">Uploading... please wait</div></div>');
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
                        $children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.parent'><unit relativeTo='ca_objects.children' restrictToTypes='Enregistrement'>^ca_objects.object_id</unit></unit>");
                        $num_media = sizeof($children);
                        $children = explode(';', $children);
                        $template =
"
<li>
	<ifnotdef code='ca_object_representations.media.mp3.url'><div class='disabled'></ifnotdef>
	<div class='card-content-item 
		<ifnotdef code=\"ca_object_representations.media.mp3.url\">track-card-content-item</ifnotdef> 
		<ifdef code=\"ca_object_representations.media.mp3.url\">alreadytrack-card-content-item has-mp3</ifdef>
		'
		ondrop='<ifnotdef code=\"ca_object_representations.media.mp3.url\">upload_file(event, ^ca_objects.object_id)</ifnotdef> '
		ondragover='return false'>
		<p class='trackname' data-mp3='^ca_object_representations.media.mp3.url' 
			data-filename='^ca_object_representations.preferred_labels' 
			data-representation='^ca_object_representations.representation_id' 
			onclick='loadTrack(\"!!TITLE!!\",\"^ca_object_representations.media.mp3.url \", \"^ca_object_representations.representation_id\");'>
			<ifdef code='face'><span class=\"tag is-light\">^ca_objects.face</span></ifdef>
				^ca_objects.preferred_labels.name !!SAMPLE_BUTTON!!
		</p>
		<div class='icon-group'> 
			^ca_objects.duree
			<a href='#' class='card-content-icon card-content-icon-info-track' aria-label='info'>
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
							$titre =  $vt_object->getWithTemplate("^ca_objects.preferred_labels.name");
							$titre = trim(str_replace(["\n", "\t", "  "], " ", $titre));
							$titre = str_replace(['"',"'"], "´", $titre);

                            echo $vt_object->getWithTemplate(str_replace("!!TITLE!!", $titre, $template));
                        }
                        ?>

					</ol>
<script>
	$(document).ready(function() {
		if($(".has-mp3").length > 0) {
			$(".player-list button").show();
		}
	});

	function playlistLoadAndPlay() {
		console.log("playlistLoadAndPlay");
        parent.loadPlaylist([
            <?php
			$children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.children' restrictToTypes='Enregistrement'>^ca_objects.object_id</unit>");
			$num_media = sizeof($children);
			$children = explode(';', $children);
			$children = array_reverse($children, true);
			$vt_parent = $t_object;
            foreach ($children as $key => $child_id) {
				$vt_object = new ca_objects($child_id);
				//echo $vt_object->getWithTemplate($template);
				$media_url = $vt_object->getWithTemplate("^ca_object_representations.media.mp3.url");
				if(!$media_url) continue;
				$album = addslashes($vt_parent->getWithTemplate("<l>^ca_objects.preferred_labels.name</l>"));
				$album = str_replace("\n", " ", $album);
				print "{name:\"".addslashes($vt_object->getWithTemplate("<unit relativeTo='ca_object_representations'><l>^ca_objects.preferred_labels.name</l></unit>"))."\",".
					"url:\"".addslashes($media_url)."\",".
					"image:\"".addslashes($t_object->getWithTemplate("^ca_object_representations.media.large.url"))."\",".
					"artist:\"".addslashes($vt_object->getWithTemplate("<unit relativeTo='ca_entities' restrictToRelationshipTypes='interprete'><l>^ca_entities.preferred_labels</l></unit>"))."\",".
					"album:\"".$album."\"},";
			}
            ?>
        ]);
		parent.playTrack();
    }

	function playlistLoad() {
		console.log("playlistLoad");
        parent.loadPlaylist([
            <?php
			$children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.children' restrictToTypes='Enregistrement'>^ca_objects.object_id</unit>");
			$num_media = sizeof($children);
			$children = explode(';', $children);
			$children = array_reverse($children, true);
			$vt_parent = $t_object;
            foreach ($children as $key => $child_id) {
				$vt_object = new ca_objects($child_id);
				//echo $vt_object->getWithTemplate($template);
				$media_url = $vt_object->getWithTemplate("^ca_object_representations.media.mp3.url");
				if(!$media_url) continue;
				$album = addslashes($vt_parent->getWithTemplate("<l>^ca_objects.preferred_labels.name</l>"));
				$album = str_replace("\n", " ", $album);
				print "{name:\"".addslashes($vt_object->getWithTemplate("<unit relativeTo='ca_object_representations'><l>^ca_objects.preferred_labels.name</l></unit>"))."\",".
					"url:\"".addslashes($media_url)."\",".
					"image:\"".addslashes($t_object->getWithTemplate("^ca_object_representations.media.large.url"))."\",".
					"artist:\"".addslashes($vt_object->getWithTemplate("<unit relativeTo='ca_entities' restrictToRelationshipTypes='interprete'><l>^ca_entities.preferred_labels</l></unit>"))."\",".
					"album:\"".$album."\"},";
			}
            ?>
        ]);
    }

	function addEndOfPlaylistAndPlay() {
		console.log("playlistLoad");
        parent.addEndOfPlaylist([
            <?php
			$children = $t_object->getWithTemplate("<unit relativeTo='ca_objects.children' restrictToTypes='Enregistrement'>^ca_objects.object_id</unit>");
			$num_media = sizeof($children);
			$children = explode(';', $children);
			$vt_parent = $t_object;
			$album = addslashes($vt_parent->getWithTemplate("<l>^ca_objects.preferred_labels.name</l>"));
			$album = str_replace("\n", " ", $album);

			//$children = array_reverse($children, true);
            foreach ($children as $key => $child_id) {
				$vt_object = new ca_objects($child_id);
				//echo $vt_object->getWithTemplate($template);
				$media_url = $vt_object->getWithTemplate("^ca_object_representations.media.mp3.url");
				if(!$media_url) continue;
				print "{name:\"".addslashes($vt_object->getWithTemplate("<unit relativeTo='ca_object_representations'><l>^ca_objects.preferred_labels.name</l></unit>"))."\",".
					"url:\"".addslashes($media_url)."\",".
					"image:\"".addslashes($t_object->getWithTemplate("^ca_object_representations.media.large.url"))."\",".
					"artist:\"".addslashes($vt_object->getWithTemplate("<unit relativeTo='ca_entities' restrictToRelationshipTypes='interprete'><l>^ca_entities.preferred_labels</l></unit>"))."\",".
					"album:\"".$album."\"},";
			}
            ?>
        ]);
		parent.playTrack();
    }
	
</script>



				</div>
				<!-- TODO : afficher uniquement si logué -->
				<?php if($this->request->isLoggedIn()): ?>
					<a href="/index.php/Contribuer/Do/Form/table/ca_objects/type/Enregistrement/parent_id/<?= $vn_id ?>"><button class="button is-primary">Ajouter une piste</button></a><span style="line-height:40px;"> ou glisser un fichier audio sur une piste</span>
				<?php endif; ?>
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
  	<div class="column">
  		<div id="bottomDetail"></div>
	</div>
</div>

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
            "source": {name: "Chemin vers le fichier source", icon: "fas fa-link"},
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
	.info_pressage_pistes td.partie_titre a {
		color:black;
		text-decoration: underline;
	}
</style>