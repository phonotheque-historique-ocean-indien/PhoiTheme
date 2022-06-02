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
 
	$t_entity = 			$this->getVar("item");
	$t_object = 			$this->getVar("item");
	$va_comments = 			$this->getVar("comments");
	$va_tags = 				$this->getVar("tags_array");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$vn_id =				$t_entity->get('ca_entities.entity_id');

	MetaTagManager::addMetaProperty("og:url", "https://www.phoi.io/index.php/Detail/entities/".$vn_id);
	MetaTagManager::addMetaProperty("og:type", "website");
	$description = "Phonothèque Historique de l'Océan Indien - phoi.io";
	MetaTagManager::addMetaProperty("og:description", $description);
	$title = "👤 ".str_replace("\n"," ",$t_object->get("ca_entities.preferred_labels"));
	MetaTagManager::setWindowTitle($title);
	MetaTagManager::addMetaProperty("og:title", $title);
	MetaTagManager::addMetaProperty("og:image:alt", $title);
	MetaTagManager::addMetaProperty("og:image", "https://www.phoi.io/img_article_phoi.png");


?>
<!-- ca_entities_org_html.php -->

<script>
	window.parent.history.pushState('', "<?= $browser_tab_label ?>", 'https://www.phoi.io/index.php/Detail/entities/<?= $vn_id ?>');
	window.parent.document.title = "<?= $browser_tab_label ?>";
</script>

<h1 class="titre-auteur">{{{^ca_entity_labels.displayname}}}</h1>
<h2 class="alias-auteur">{{{<unit relativeTo="ca_entities.related" restrictToRelationshipTypes="alias" delimiter=", ">^ca_entities.preferred_labels}}}</h1>

<div class="columns">
	<div class="column is-one-third">
		<div class="card infosprincipales" style="max-height: none;">
			<header class="card-header">
				<p class="card-header-title">Description</p>
			</header>
			<div class="card-content">
				<div class="content">
					<img src="{{{^ca_object_representations.media.original.url}}}" style="width:100%;height:auto;"/>
				</div>
			</div>
		</div>

		<div class="card infosprincipales">
			<header class="card-header">
				<p class="card-header-title">Description</p>
				<a href="#" class="card-header-icon" aria-label="edit">
				    <span class="icon">
						<i class="mdi mdi-pencil is-large"></i>
					</span>
				</a>
			</header>
			<div class="card-content">
				<div class="content">
					<b>Né(e) le</b> : {{{ }}}<br/><!-- à compléter pour l'appel de la donnée-->
					<b>(Mort le</b> : {{{ }}})<br/><!-- à compléter pour l'appel de la donnée-->
					<b>Biographie</b> : <br/>
					<b><a href="#">Lien sur le fonds de collectage</a></b>
				</div>
			</div>
		</div>
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Liste des œuvres composées</p>
			</header> 
		</div>
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Liste des œuvres arrangées</p>
			</header>
		</div>
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Liste des groupes :</p>
			</header>
		</div>
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Liste des instruments :</p>
			</header>
		</div>		
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Liste des citations :</p>
			</header>
		</div>	
	</div><!-- first column ends here-->
	<div class="column is-half">
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Relations</p>
			</header> <!-- menu déroulant à ajouter pour titre et iswc-->
			<div style="padding:20px;">
			{{{<unit relativeTo="ca_entities.related" restrictToRelationshipTypes="famille" delimiter=" "><b>Famille</b> : <l>^ca_entities.preferred_labels</l><br/></unit>}}}
			{{{<unit relativeTo="ca_entities.related" restrictToRelationshipTypes="parenté" delimiter=" "><b>Père/Mère</b> : <l>^ca_entities.preferred_labels</l><br/></unit>}}}
			{{{<unit relativeTo="ca_entities.related" restrictToRelationshipTypes="related" delimiter=" "><b>Voir aussi</b> : <l>^ca_entities.preferred_labels</l><br/></unit>}}}
			</div>
		</div>
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Biographie</p>
			</header> <!-- menu déroulant à ajouter pour titre et iswc-->
			<div style="padding:20px;">
				{{{^ca_entities.biography}}}
			</div>
		</div>
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Liste des enquêtes :</p>
			</header>
		</div>
		<div class="card">
            <header class="card-header">
                <p class="card-header-title"><?php _p("Liste des albums en tant qu'artiste :"); ?></p>
            </header>
            <div class="card-content">
                <div class="content">
<?php

	$album_ids = explode(";", $t_entity->getWithTemplate("<unit relativeTo='ca_objects' excludeRelationshipTypes='fonds'>^ca_objects.parent.object_id</unit>"));
	//$album_ids = $vt_linked_ent->get("ca_objects.parent.object_id");
	$albums = [];
	foreach($album_ids as $album_id) {
		$vt_album = new ca_objects($album_id);
		$albums[$album_id] = ["titre" => $vt_album->get("ca_objects.preferred_labels"), "icone"=>$vt_album->get("ca_object_representations.media.icon.url")];
	}
	
	print "Sous le nom ".$t_entity->get("ca_entities.preferred_labels")."<br/>";
	foreach($albums as $key=>$album) {
		print '<div class="card-content-item">
			<p><a href="/index.php/Detail/objects/'.$key.'"><img src="'.$album["icone"].'" style="height:32px;vertical-align:absmiddle" />'.$album["titre"].'</a></p>
		</div>';
	}

//print "-->";
?>

<?php
$linked_ids = explode(";", $t_entity->get("ca_entities.related.entity_id"));
//print "<!-- linked_ids";
//var_dump($linked_ids);
foreach($linked_ids as $linked_id) {
	//var_dump($linked_id);
	$vt_linked_ent = new ca_entities($linked_id);
	$album_ids = explode(";", $vt_linked_ent->get("ca_objects.parent.object_id"));
	//$album_ids = $vt_linked_ent->get("ca_objects.parent.object_id");
	$albums = [];
	foreach($album_ids as $album_id) {
		$vt_album = new ca_objects($album_id);
		$albums[$album_id] = ["titre" => $vt_album->get("ca_objects.preferred_labels"), "icone"=>$vt_album->get("ca_object_representations.media.icon.url")];
	}
	$other_name = $vt_linked_ent->get("ca_entities.preferred_labels");
	if($other_name) {
	print "Sous le nom ".$other_name."<br/>";
		foreach($albums as $key=>$album) {
			print '<div class="card-content-item">
				<p><a href="/index.php/Detail/objects/'.$key.'"><img src="'.$album["icone"].'" style="height:32px;vertical-align:absmiddle" />'.$album["titre"].'</a></p>
			</div>';
		}
	}

	
}
//print "-->";
?>
				</div>
            </div>
        </div>
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Liste des enregistrements produits :</p>
			</header>
		</div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><?php _p("Fonds :"); ?></p>
            </header>
            <div class="card-content">
                <div class="content" style="max-height:500px;overflow-y:scroll">
                <?php

                    $album_ids = explode(";", $t_entity->getWithTemplate("<unit relativeTo='ca_objects' restrictToRelationshipTypes='fonds'>^ca_objects.object_id</unit>"));
                    //$album_ids = $vt_linked_ent->get("ca_objects.parent.object_id");
                    $albums = [];
                    foreach($album_ids as $album_id) {
                        $album_id = trim($album_id);
                        $vt_album = new ca_objects($album_id);
                        $albums[$album_id] = ["titre" => $vt_album->get("ca_objects.parent.preferred_labels"), "icone"=>$vt_album->getWithTemplate("<unit relativeTo='ca_objects.parent'>^ca_object_representations.media.icon.url</unit>")];
                    }
                    
                    foreach($albums as $key=>$album) {
                        print '<div class="card-content-item">
                            <p><a href="/index.php/Detail/objects/'.$key.'"><img src="'.$album["icone"].'" style="height:32px;vertical-align:absmiddle" />'.$album["titre"].'</a></p>
                        </div>';
                    }

                //print "-->";
                ?>  
                </div>
            </div>
        </div>
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Structure représentées :</p>
			</header>
		</div>		
		<div class="card">
			<header class="card-header">
				<p class="card-header-title">Tags</p>
			</header>
		</div>
	</div><!-- second column column ends here-->
	<div class="column" id="bottomDetail">
	</div>
</div>

<div></div>


<style>
	.card {
		border:1px solid #e0e0e0;
		margin-bottom:10px;
	}

	.card-header-title {
		align-items: baseline !important;
		padding: 0.75rem 1rem 0.5rem 1rem !important;
	}
	
	.card-content-item {
		display: flex;
		align-items: stretch;
		justify-content: space-between;
	}
	
	.card-content-item p{
		margin: 0 !important;
	}

	.card .media:not(:last-child) {
		margin-bottom:0.5rem;
	}

	.content figure {
		margin-left: 0;
		margin-right: 0;
	}

	.content ul {
		list-style: none;
		margin: 0 !important;
	}

	.infosprincipales {
		max-height: 220px;
		overflow-y: scroll;
	}

	.sortby {
		margin-left:0 !important;
		margin-top:0 !important;
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

	.item-accessoires .card-header-title {
		border-bottom : 1px solid #CCCCCC;
	}

	.is-active {
		color: #232425;
		border-bottom: 0.1em solid #232425;
	}
	
	h1.titre-auteur {
    text-align: center;
    font-weight: 100;
    font-size: 1.8em;
    padding-top: 1em;
    padding-bottom: 0.5em;
	}

	h2.alias-auteur {
		text-align: center;
		font-weight: 100;
		font-size: 1.1em;
		padding-top: 0;
		padding-bottom: 1em;		
	}

</style>