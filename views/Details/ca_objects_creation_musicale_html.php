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
 
	$t_object = 			$this->getVar("item");
	$va_comments = 			$this->getVar("comments");
	$va_tags = 				$this->getVar("tags_array");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$vn_id =				$t_object->get('ca_objects.object_id');

    $vn_id = $t_object->get('ca_objects.object_id');

// sanitize page name for browse tab
$browser_tab_label = $t_object->get('ca_objects.preferred_labels.name');
$browser_tab_label = str_replace(["\n","\t"], "", $browser_tab_label);
$browser_tab_label = str_replace("'", "‘", $browser_tab_label);


?>
<script>
	window.parent.history.pushState('', "<?= $browser_tab_label ?>", 'https://www.phoi.io/index.php/Detail/objects/<?= $vn_id ?>');
	window.parent.document.title = "<?= $browser_tab_label ?>";
</script>
<!-- ca_objects_creation_musicale_html.php -->
<h1 class="titre-interpretation">	<span class="tag is-work">
		<i class="mdi mdi-music-clef-treble is-large"></i>
	</span> {{{^ca_objects.preferred_labels.name}}}</h1>

	<div class="columns">
  <div class="column is-half">
    <div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      Informations sur la création musicale
	    </p>
	    <a href="#" class="card-header-icon" aria-label="edit">
		    <span class="icon">
				<i class="mdi mdi-pencil is-large"></i>
	  		</span>
	    </a>
	  </header>
	  <div class="card-content">
	    <div class="content">
<?php
$template2 = "<unit relativeTo='ca_entities' delimiter=' ; '><l>^ca_entities.preferred_labels</l>|^relationship_typename</unit>";
	$vt_object = $t_object;
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
	print "";
	foreach($results as $auteur=>$fonctions) {
		print $auteur." (".implode(", ", $fonctions).")<br/>";
	} 
	//print "<br/>\n";
?>
{{{
	<unit relativeTo='ca_objects.description' delimiter=' '>
						^ca_objects.description
</unit>
<unit relativeTo='ca_objects.notes' delimiter=' '>
						^ca_objects.notes
</unit>
}}}

	    </div>
	  </div>
	</div>		

	<div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p('Tags');?>
	    </p>
		<a onClick="$('#iframetags2').toggle();$('#ultags2').toggle();" class="card-header-icon" aria-label="edit" style="display: none;">
            <span class="icon">
                <i class="mdi mdi-pencil is-large"></i>
            </span>
		</a>
	  </header>
	  <div class="card-content" style="">
	    <div class="content">
		    <uL id='ultags2' class='ultags'>
				{{{
					<unit relativeTo='ca_objects.tag' delimiter=' '>
						<ifdef code='ca_objects.tag.item_id'>
				<li style='display:inline-block;'>
			    	<div class="card-content-item">
						<p class="tag"><a href="/index.php/Thesaurus/View/Index?tag=^ca_objects.tag.item_id">^ca_objects.tag</a></p>
					</div>
			    </li>
						</ifdef>
			    </unit>}}}
		    </uL>
			<iframe src="/index.php/Contribuer/Tags/Index/id/<?= $t_object->get('ca_objects.object_id') ?>/redirect/<?= $t_object->get('ca_objects.object_id') ?>" id="iframetags2" class="iframetags" style="display:none;min-height:200px;min-width:100%;" ></iframe>
	    </div>
	  </div>
	</div>

	{{{<unit relativeTo='ca_objects.related' restrictToTypes="Partition" delimiter=' '>
	<div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p('Partitions');?>
	    </p>
		
	  </header>
	  <div class="card-content" style="">
	    <div class="content">
		    <l>^ca_object_representations.media.preview170 <br/>
			^ca_objects.preferred_labels</l>
	    </div>
	  </div>
	</div>
	</unit>}}}
	
  </div>
  <div class="column ">
  <div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      Interprétations
	    </p>
	    <a href="#" class="card-header-icon" aria-label="edit">
		    <span class="icon">
				<i class="mdi mdi-pencil is-large"></i>
	  		</span>
	    </a>
	  </header>
	  <div class="card-content">
	    <div class="content">
			{{{
				<unit relativeTo='ca_objects.related' restrictToTypes="Enregistrement,Interprétation" delimiter="<br/>">
				<unit relativeTo='ca_objects.parent'>
					<small style="display:block;margin-top:10px;line-height:1em;"><img src='^ca_object_representations.media.icon.url' style='height:40px;float:left;padding-right:3px;'/> ^ca_objects.preferred_labels</small>
				</unit>
				<l>^ca_objects.preferred_labels.name</l></unit><br/>
			}}}
			</div>
	  </div>
	</div>		
  </div>
	<div class="column is-one-fifth">
		<div id="bottomDetail"></div>
	</div>
</div>
<script>
  $('img[data-enlargable]').addClass('img-enlargable').click(function(){
    var src = $(this).attr('src');
    var modal;
    function removeModal(){ modal.remove(); $('body').off('keyup.modal-close'); }
    modal = $('<div>').css({
        background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
        backgroundSize: 'contain',
        width:'100%', height:'100%',
        position:'fixed',
        zIndex:'10000',
        top:'0', left:'0',
        cursor: 'zoom-out'
    }).click(function(){
        removeModal();
    }).appendTo('body');
    //handling ESC
    $('body').on('keyup.modal-close', function(e){
      if(e.key==='Escape'){ removeModal(); } 
    });
});
</script>
<style>
	h1.titre-phonogramme {
		
	}
	.card {
		border:1px solid #e0e0e0;
		margin-bottom:10px;
	}
	.infosprincipales {
	    max-height: 220px;
		overflow-y: scroll;
	}
	
	.card-content {
		padding: 1.5rem;
	}

	.card-cover-icon {
		z-index: 99;

	}
  	
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
	h1.titre-interpretation {
		padding-bottom: 0;
		text-align: center;
		font-weight: 100;
		font-size: 1.8em;
		padding-top: 1em;
	}
	h2.creation-musicale {
		text-align: center;
		font-size: 1.1em;
		padding-top: 0;
		padding-bottom: 1em;
		font-weight: 500;;		
	}
	.tag.is-work {
		height: 2em;
		line-height: 1.6;
		padding-left: 0.25em;
		padding-right: 0.25em;
		background-color: #426A7A !important;
		color:white;
	}
	.tag.is-work i {
		font-size: 1.2em;
	}
	.creation-musicale button {
		font-size:0.7em;
	}
</style>