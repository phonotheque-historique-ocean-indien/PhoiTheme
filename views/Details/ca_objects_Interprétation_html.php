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
	//$t_object = new ca_objects(130);
	$va_comments = 			$this->getVar("comments");
	$va_tags = 				$this->getVar("tags_array");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$vn_id =				$t_object->get('ca_objects.object_id');
    $type =                 $t_object->getTypeCode();
    
    if(!function_exists("getYoutubeEmbedUrl")) {
	    function getYoutubeEmbedUrl($url) {
			$shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
			$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
			
			if (preg_match($longUrlRegex, $url, $matches)) {
				$youtube_id = $matches[count($matches) - 1];
			}
			
			if (preg_match($shortUrlRegex, $url, $matches)) {
				$youtube_id = $matches[count($matches) - 1];
			}
			return 'https://www.youtube.com/embed/' . $youtube_id ;
		}
	}


?>

<!-- ca_objects_Interpretation_html.php -->
<h1 class="titre-phonogramme">{{{^ca_objects.preferred_labels.name}}}</h1>
<div class="columns">
  <div class="column is-one-third">
	<div class="card infosprincipales">
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
	      <b><?php _p("Année"); ?></b> : {{{<ifdef code='ca_objects.date'>^ca_objects.date</ifdef><ifnotdef code='ca_objects.date'>Non renseigné</ifnotdef>}}}<br/>
	      {{{<ifdef code='ca_objects.notes'>
	      <b><?php _p("Description"); ?></b> : 
	      <div class="description_side">
	      ^ca_objects.notes
	      </div>
	      </ifdef>}}}
	    </div>
	  </div>
	</div>

	
  </div>

  <div class="column">
    <div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p("Interprétation"); ?>
	    </p>
          <a href="<?= __CA_URL_ROOT__ ?>/index.php/Contribuer/Do/EditForm/table/ca_objects/type/<?= $type ?>/id/<?= $vn_id ?>" class="card-header-icon" aria-label="edit" style="/* display: none; */">
            <span class="icon">
                <i class="mdi mdi-pencil is-large"></i>
            </span>
          </a>

	  </header>
	  <div class="card-content">
	    <div class="content content-infos-phonogramme">
			{{{<unit relativeTo="ca_entities" restrictToRelationshipTypes="label"><p>Label : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="label"><l>^ca_entities.preferred_labels</l></unit></p></unit>}}}
			{{{<unit relativeTo="ca_entities" restrictToRelationshipTypes="auteur"><p>Auteur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="auteur"><l>^ca_entities.preferred_labels</l></unit></p></unit>}}}
			{{{<unit relativeTo="ca_entities" restrictToRelationshipTypes="compositeur"><p>Compositeur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="compositeur"><l>^ca_entities.preferred_labels</l></unit></p></unit>}}}
			{{{<unit relativeTo="ca_entities" restrictToRelationshipTypes="producteur"><p>Producteur : 
				<unit relativeTo="ca_entities" restrictToRelationshipTypes="producteur"><l>^ca_entities.preferred_labels</l></unit></p></unit>}}}
			<p>Format : {{{^ca_objects.format}}}</p>
		    {{{<ifdef code="duree"><p>Durée : ^ca_objects.duree</p></ifdef>}}}
		    {{{<ifdef code="creation_couv"><p>Création maquette : ^ca_objects.creation_couv</p></ifdef>}}}
			<p><b>Relations</b> : {{{<unit relativeTo="ca_objects.related"><l>^ca_objects.preferred_labels (^ca_objects.type_id)</l></unit>}}}</p>
	    </div>
	  </div>
	</div>

	<div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p("Tags"); ?>
	    </p>
	  </header>
	  <div class="card-content" style="">
	    <div class="content">
		    <uL>
			    {{{<unit relativeTo='ca_objects.tag' delimiter=' '>
			    	<li style='display:inline-block;'>
			    	<div class="card-content-item">
					<p class="tag">^ca_objects.tag</p>
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

	<div class="card embed">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php _p("Player"); ?>
	    </p>
	  </header>
	  <div class="card-content" style="">
	    <div class="content">
		    <uL>
			    <?php if($youtube = $t_object->get("ca_objects.youtube")): 
			    ?>
			    	<iframe id="ytplayer" type="text/html" style="width:100%; height:500px;"
src="<?php echo  getYoutubeEmbedUrl($youtube); ?>" allowfullscreen
frameborder="0" allowfullscreen></iframe>
			    <?php endif; ?>
		    </uL>
	    </div>
	  </div>
	</div>



	<div class="card medias">
	  <header class="card-header">
	    <p class="card-header-title">
	      <?php print $t_object->getRepresentationCount(); ?> <?php _p("Médias attachés"); ?>
	    </p>
          <div class="icon-group">
              <a href="#" class="card-content-icon" aria-label="delete">
					    <span class="icon">
							<i class="mdi mdi-close is-large"></i>
						</span>
              </a>
              <a onClick="caMediaPanel.showPanel('/index.php/Contribuer/Media/MediaAdd/table/objects/id/<?php echo $vn_id; ?>'); return false;" class="card-content-icon" aria-label="edit">
					    <span class="icon">
							<i class="mdi mdi-pencil is-large"></i>
						</span>
              </a>
          </div>
	  </header>
	  <div class="card-content">
	    <div class="content">
			<?php
            $representations = $t_object->getRepresentations(["preview170","large"]);
            //print $representation["tags"]["preview170"];
            foreach($representations as $key=>$representation) {
                print "<img data-enlargable style=\"height:140px\" style=\"cursor: zoom-in\"  src='".$representation["urls"]["large"]."' >";
            }
			?>
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
	        backgroundSize: '44%',
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
        overflow-x: scroll;
        overflow-y: hidden;
        white-space: nowrap;
        padding-bottom:15px;
    }
    .medias .card-content .content img {
        padding-right:15px;
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
	
</style>
