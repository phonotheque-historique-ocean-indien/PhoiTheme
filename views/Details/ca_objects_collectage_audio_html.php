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

?>
<!-- ca_objects_collectage_audio_html.php -->
<!--

		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
-->
<h1 class="titre-phonogramme">{{{^ca_objects.preferred_labels.name}}}</h1>
<div class="columns">
    <div class="column is-four-fifths">
        <div class="card ">
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
                    <b><?php _p("Description"); ?></b> : {{{^ca_objects.notes}}}
                </div>
            </div>
        </div>

        <div class="card">
            <header class="card-header">
                <div class="card-header-title">
                    <div class="column player-icons is-one-quarter">
					<span class="icon">
						<i class="mdi mdi-play is-large" onclick="$('#soundplayer')[0].play();"></i>
					</span>
                        <span class="icon">
						<i class="mdi mdi-stop is-large" onclick="$('#soundplayer')[0].pause();$('#soundplayer')[0].currentTime = 0"></i>
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
                    <div class="player-list">
                        <ol type="1">
                            <?php
                            $template =
                                "<li>
	<div class='card-content-item'>
		<p onclick='loadTrack(\"^ca_objects.preferred_labels.name\",\"^ca_object_representations.media.mp3.url \");'> ^ca_objects.preferred_labels.name</p>
		<div class='icon-group'>
			<a href='#' class='card-content-icon' aria-label='delete'>
				<span class='icon'>
					<i class='mdi mdi-close is-large'></i>
				</span>
			</a>
			<a href='#' class='card-content-icon' aria-label='add'>
				<span class='icon'>
					<i class='mdi mdi-plus is-large'></i>
				</span>
			</a>
			^ca_objects.duree
			<a href='#' class='card-content-icon' aria-label='info'>
				<span class='icon'>
					<i class='mdi mdi-information is-large'></i>
				</span>
			</a>
		</div>
	</div>	
</li>";
                            print $t_object->getWithTemplate($template);
                            ?>

                        </ol>
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
                        <li>tag 1</li>
                        <li>tag 2</li>
                        <li>tag 3</li>
                    </uL>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="item-accessoires">
    <div class="card infosprincipales">
        <header class="card-header">
            <p class="card-header-title">
                <?php _p("10 items les plus vus"); ?>
            </p>
        </header>
        <div class="card-content">
            <div class="content">
                <div class="columns">
                    <div class="column is-one-quarter">

                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-one-quarter">

                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-one-quarter">

                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-one-quarter">

                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-4">Titre</p>
                                        <p class="subtitle is-6">Auteur</p>
                                    </div>
                                </div>

                                <div class="content">
                                    Début de description
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
</style>
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

    });
</script>
