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
	$t_object = new ca_objects();
	$va_comments = 			$this->getVar("comments");
	$va_tags = 				$this->getVar("tags_array");
	$vn_comments_enabled = 	$this->getVar("commentsEnabled");
	$vn_share_enabled = 	$this->getVar("shareEnabled");
	$vn_pdf_enabled = 		$this->getVar("pdfEnabled");
	$vn_id =				$t_object->get('ca_objects.object_id');
?>

<!-- ca_objects_default_html.php -->
<h1 class="titre-phonogramme">{{{^ca_objects.preferred_labels.name}}}</h1>
<div class="columns">
  <div class="column is-one-third">
	<div class="card infosprincipales">
	  <header class="card-header">
	    <p class="card-header-title">
	      Description
	    </p>
	    <a href="#" class="card-header-icon" aria-label="edit">
		    <span class="icon">
				<i class="mdi mdi-pencil is-large"></i>
	  		</span>
	    </a>
	  </header>
	  <div class="card-content">
	    <div class="content">
	      <b>Année</b> : {{{^ca_objects.date}}}<br/>
	      <b>Description</b> : {{{^ca_objects.notes}}}
	    </div>
	  </div>
	</div>
  
	<div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      Liste des pressages de cet album
	    </p>
	  </header>
	  <div class="card-content">
	    <div class="content">
		    <div class="card-content-item">
				<p>Pressage 1</p>
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
				<p>Pressage 2</p>
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
				<p>Pressage 3</p>
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
				<p>Pressage 4</p>
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
			  Informations sur le pressage
			</p>
		</header>
		<div class="card-content">
			<div class="content">
				<div class="card-content-item">
					<p>Titre 1</p>
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
					<p>Titre 2</p>
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
				<p>Titre 3</p>
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
				<p>Titre 4</p>
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
	      Liste des items phonogrammes de ce pressage
	    </p>
	  </header>
	  <div class="card-content">
	    <div class="content">
			<div class="card-content-item">
				<p>Item 1</p>
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
				<p>Item 2</p>
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
				<p>Item 3</p>
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
    
  <div class="column is-half">
    <div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      Informations sur l'item phonogramme
	    </p>
	    <a href="#" class="card-header-icon" aria-label="edit">
		    <span class="icon">
				<i class="mdi mdi-pencil is-large"></i>
	  		</span>
	    </a>
	  </header>
	  <div class="card-content">
	    <div class="content">
		    Date de dépôt :<br/>
		    Utilisateur ayant fait le dépôt :<br/>
		    Mode d'obtention :<br/>
		    Tags : 
	    </div>
	  </div>
	</div>		

	<div class="card">
	  	<header class="card-header">
			<div class="card-header-title">
				<div class="player-icons">
					<span class="icon">
						<i class="mdi mdi-play is-large"></i>
					</span>
					<span class="icon">
						<i class="mdi mdi-stop is-large"></i>
					</span>
					<span class="icon">
						<i class="mdi mdi-skip-previous is-large"></i>
					</span>
					<span class="icon">
						<i class="mdi mdi-skip-next is-large"></i>
					</span>
				</div>
				<div class="column is-three-quarters is-centered">
					<div class="card-header-title player-title">
						<h3>Titre du morceau</h3>
						<p>0:32/2:45</p>
					</div>
					<progress class="progress is-small" value="15" max="100">15%</progress>
				</div>
			</div>
	  	</header>
	  	<div class="card-content">
			<div class="content">
				<div class="player-list">
					<ol type="1">
						<li>
							<div class="card-content-item">
								<p>Titre du premier morceau</p>
								<div class="icon-group">
									<a href="#" class="card-content-icon" aria-label="delete">
										<span class="icon">
											<i class="mdi mdi-close is-large"></i>
										</span>
									</a>
									<a href="#" class="card-content-icon" aria-label="add">
										<span class="icon">
											<i class="mdi mdi-plus is-large"></i>
										</span>
									</a>
									02:45
									<a href="#" class="card-content-icon" aria-label="info">
										<span class="icon">
											<i class="mdi mdi-information is-large"></i>
										</span>
									</a>
								</div>
							</div>	
						</li>
						<li>
							<div class="card-content-item">
								<p>Titre du morceau suivant</p>
								<div class="icon-group">
									<a href="#" class="card-content-icon" aria-label="delete">
										<span class="icon">
											<i class="mdi mdi-close is-large"></i>
										</span>
									</a>
									<a href="#" class="card-content-icon" aria-label="add">
										<span class="icon">
											<i class="mdi mdi-plus is-large"></i>
										</span>
									</a>
									03:46
									<a href="#" class="card-content-icon" aria-label="info">
										<span class="icon">
											<i class="mdi mdi-information is-large"></i>
										</span>
									</a>
								</div>
							</div>
						</li>
						<li>
							<div class="card-content-item">
								<p>Titre du morceau suivant</p>
								<div class="icon-group">
									<a href="#" class="card-content-icon" aria-label="delete">
										<span class="icon">
											<i class="mdi mdi-close is-large"></i>
										</span>
									</a>
									<a href="#" class="card-content-icon" aria-label="add">
										<span class="icon">
											<i class="mdi mdi-plus is-large"></i>
										</span>
									</a>
									02:31
									<a href="#" class="card-content-icon" aria-label="info">
										<span class="icon">
											<i class="mdi mdi-information is-large"></i>
										</span>
									</a>
								</div>
							</div>
						</li>
					</ol>
				</div>
				<div class="player-covers">
					<div class="cover">
						<img src="https://via.placeholder.com/120">
						<a href="#" class="card-cover-icon" aria-label="delete">
							<span class="icon">
								<i class="mdi mdi-close is-large"></i>
							</span>
						</a>
					</div>
					<div class="cover">
						<img src="https://via.placeholder.com/120">
						<a href="#" class="card-cover-icon" aria-label="delete">
							<span class="icon">
								<i class="mdi mdi-close is-large"></i>
							</span>
						</a>
					</div>
					<div class="cover">
						<img src="https://via.placeholder.com/120">
						<a href="#" class="card-cover-icon" aria-label="delete">
							<span class="icon">
								<i class="mdi mdi-close is-large"></i>
							</span>
						</a>
					</div>
					<div class="cover">
						<img src="https://via.placeholder.com/120">
						<a href="#" class="card-cover-icon" aria-label="delete">
							<span class="icon">
								<i class="mdi mdi-close is-large"></i>
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
	      Médias attachés
	    </p>
	  </header>
	  <div class="card-content">
	    <div class="content">
			A venir
	    </div>
	  </div>
	</div>		
	
  </div>
  <div class="column">
    <div class="card">
	  <header class="card-header">
	    <p class="card-header-title">
	      Tags
	    </p>
	  </header>
	  <div class="card-content">
	    <div class="content">
		    <uL>
			    <li>
			    	<div class="card-content-item">
					<p class="tag">tag 1</p>
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
			    <li>
			    	<div class="card-content-item">
					<p class="tag">tag 2</p>
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
			    <li>
			    	<div class="card-content-item">
					<p class="tag">tag 3</p>
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
				<!-- ***** FIN MODIFS RACHEL *****/-->
		    </uL>
	    </div>
	  </div>
	</div>		
  </div>
</div>
<div class="item-accessoires">
	<div class="card infosprincipales">
	  <header class="card-header">
	    <div class="card-header-title">
		    <div class="tags are-medium">
			  <span class="tab is-active">10 items les plus vus</span>
			  <span class="tab">10 items au hasard</span>
			  <span class="tab">Voir tous</span>
			</div>
	    </div>
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
	
	/****** FIN MODIFS RACHEL ****/
</style>