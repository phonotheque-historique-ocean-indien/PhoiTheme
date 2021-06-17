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
    $type =                 strtolower($t_object->getTypeCode());

	require_once(__CA_THEME_DIR__."/helpers/mediaHelpers.php");
?>
<!--

		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
-->
<h1 class="titre-phonogramme">{{{^ca_objects.preferred_labels.name}}}</h1>
<div class="columns">
  <div class="column">
	<div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
            <?php _p("Description"); ?>
	    </p>
          <a href="<?= __CA_URL_ROOT__ ?>/index.php/Contribuer/Do/EditForm/table/ca_objects/type/<?= $type ?>/id/<?= $vn_id ?>" class="card-header-icon" aria-label="edit" style="/* display: none; */">
		    <span class="icon">
				<i class="mdi mdi-pencil is-large"></i>
	  		</span>
          </a>
	  </header>
	  <div class="card-content">
	    <div class="content">
	      <b><?php _p("Année"); ?></b> : {{{^ca_objects.date}}}<br/>
	      <b><?php _p("Description"); ?></b> : {{{^ca_objects.notes}}}<br/>
	      {{{<b><?php _p("Collectage"); ?></b> : <unit relativeTo="ca_objects.parent">^ca_objects.preferred_labels.name </unit>}}}
	    </div>
	  </div>
	</div>

    <div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php print $t_object->getRepresentationCount(); ?> <?php _p("photos"); ?>
	    </p>
	  </header>
	  <div class="card-content">
	    <div class="content">

			<div id="imageviewer">
				<?php RenderDropzone($t_object); ?>
			</div>
		</div>
	  </div>
	</div>



  </div>
  <div class="column is-one-fifth">
    <div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p("Tags"); ?>
	    </p>
	  </header>
	  <div class="card-content">
	    <div class="content">
		    <uL>

		    </uL>
	    </div>
	  </div>
	</div>
  </div>
</div>
<div id="bottomDetail"></div>
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
		padding:0.5rem 1.5rem;
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
	.img-enlargable {
		cursor:zoom-in;
		margin-bottom: 4px;
		margin-right: 4px;
	}
	.img-col {
		width:25%;
		display: inline-block;
		text-align: center;
	}
	</style>
