<?php
/* ----------------------------------------------------------------------
 * themes/default/views/bundles/ca_entities_org_html.php : 
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

$t_object =             $this->getVar("item");
$t_entity = 			$this->getVar("item");
$va_comments =             $this->getVar("comments");
$va_tags =                 $this->getVar("tags_array");
$vn_comments_enabled =     $this->getVar("commentsEnabled");
$vn_share_enabled =     $this->getVar("shareEnabled");
$vn_pdf_enabled =         $this->getVar("pdfEnabled");
$vn_id =				$t_entity->get('ca_entities.entity_id');


MetaTagManager::addMetaProperty("og:url", "https://www.phoi.io/index.php/Detail/entities/".$vn_id);
MetaTagManager::addMetaProperty("og:type", "website");
$description = "Phonothèque Historique de l'Océan Indien - phoi.io";
MetaTagManager::addMetaProperty("og:description", $description);
$title = "👥 ".str_replace("\n"," ",$t_object->get("ca_entities.preferred_labels"));
MetaTagManager::setWindowTitle($title);
MetaTagManager::addMetaProperty("og:title", $title);
MetaTagManager::addMetaProperty("og:image:alt", $title);
MetaTagManager::addMetaProperty("og:image", "https://www.phoi.io/img_article_phoi.png");
?>

<!--
		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
-->

<!-- ca_entities_grp_html.php -->

<h1 class="titre-groupe">{{{<small>[^ca_entities.type_id]</small> ^ca_entities.preferred_labels}}}</h1>
<h2 class="alias-groupe">{{{<unit relativeTo="ca_entities.related" delimiter=", ">^ca_entities.preferred_labels}}}</h1>

<div class="columns">
    <div class="column is-one-third">
        <div class="card infosprincipales">
            <header class="card-header">
                <p class="card-header-title"><?php _p("Description"); ?></p>
                <a href="#" class="card-header-icon" aria-label="edit">
                    <span class="icon">
                        <i class="mdi mdi-pencil is-large"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <b><?php _p("Début le"); ?></b> <br />
                    <b><?php _p("Fin le"); ?></b> <br />
                    <b><?php _p("Biographie"); ?></b>
                </div>
            </div>
        </div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><?php _p("Liste des interprétations"); ?> :</p>
            </header>
            <div class="card-content">
                <div class="content">
					{{{<unit relativeTo='ca_objects' delimiter=' '>
                    <div class="card-content-item">
                        <p><l>^ca_objects.preferred_labels</l></p>
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
						</unit>
					}}}
                </div>
            </div>
        </div>
<!--        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><?php _p("Liste des événéments du groupe : "); ?></p>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="card-content-item">
                        <p>Événement 1</p>
                        <p>date</p>
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
                        <p>Événement 2</p>
						<p>date</p>
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
                        <p>Événement 3</p>
                        <p>date</p>
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
        </div>-->
    </div>


    <div class="column is-half">
		<div class="card">
            <header class="card-header">
                <p class="card-header-title"><?php _p("Liste des albums du groupe :"); ?></p>
            </header>
            <div class="card-content">
                <div class="content">
				<?php

$album_ids = explode(";", $t_entity->get("ca_objects.parent.object_id"));
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

print "Sous le nom ".$vt_linked_ent->get("ca_entities.preferred_labels")."<br/>";
foreach($albums as $key=>$album) {
	print '<div class="card-content-item">
		<p><a href="/index.php/Detail/objects/'.$key.'"><img src="'.$album["icone"].'" style="height:32px;vertical-align:absmiddle" />'.$album["titre"].'</a></p>
	</div>';
}


}
//print "-->";
?>

				</div>
            </div>
        </div>


		<div class="card">
		<header class="card-header">
			<p class="card-header-title">
			<?php _p('Tags');?>
			</p>
			<a onClick="$('#iframetags').toggle();$('#ultags').toggle();" class="card-header-icon" aria-label="edit" style="display: none;">
				<span class="icon">
					<i class="mdi mdi-pencil is-large"></i>
				</span>
			</a>

			
		</header>
		<div class="card-content" style="">
			<div class="content">
				<uL id='ultags'>
					{{{<unit relativeTo='ca_entities.tag' delimiter=' '>
						<li style='display:inline-block;'>
						<div class="card-content-item">
						<p class="tag"><a href="/index.php/Thesaurus/View/Index?tag=<?= $t_entity->get("ca_entities.tag")?>">^ca_entities.tag</a></p>
							<div class="icon-group">
								<a href="#" class="card-content-icon" aria-label="delete">
									<span class="icon">
										<i class="mdi mdi-close is-large"></i>
									</span>
								</a>
								<a onClick="$('#iframetags').toggle();$('#ultags').toggle();" class="card-content-icon" aria-label="edit">
									<span class="icon">
										<i class="mdi mdi-pencil is-large"></i>
									</span>
								</a>
							</div>
						</div>
					</li>
					</unit>}}}
				</uL>

				<iframe src="/index.php/Contribuer/TagsEntites/Index/id/<?= $vn_id ?>" id="iframetags" style="display:none;min-height:200px;min-width:100%;" ></iframe>

			</div>
		</div>
		</div>
	</div>
    <div class="column">
		<div id="bottomDetail"></div>
	</div>
</div>
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
		display:block;
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
	
	h1.titre-groupe {
    text-align: center;
    font-weight: 100;
    font-size: 1.8em;
    padding-top: 1em;
    padding-bottom: 0.1em;
	}

	h1.titre-groupe small {
		font-size: 0.6em;
	}

	h2.alias-groupe {
		text-align: center;
		font-weight: 100;
		font-size: 1.1em;
		padding-top: 0;
		padding-bottom: 1em;		
	}
</style>