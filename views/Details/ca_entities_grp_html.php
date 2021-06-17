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
$va_comments =             $this->getVar("comments");
$va_tags =                 $this->getVar("tags_array");
$vn_comments_enabled =     $this->getVar("commentsEnabled");
$vn_share_enabled =     $this->getVar("shareEnabled");
$vn_pdf_enabled =         $this->getVar("pdfEnabled");
$vn_id =                $t_object->get('ca_objects.object_id');
?>

<!--
		{{{previousLink}}}{{{resultsLink}}}{{{nextLink}}}
-->
<h1 class="titre-groupe">{{{^ca_entities.type_id}}}</h1>

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
                    <b><?php _p("Début le"); ?> :</b> {{{ }}}<br /><!-- à compléter pour l'appel de la donnée-->
                    <b><?php _p("Fin le"); ?> :</b> {{{ }}})<br /><!-- à compléter pour l'appel de la donnée-->
                    <b><?php _p("Biographie"); ?> :</b>
                </div>
            </div>
        </div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><?php _p("Liste des interprétations"); ?> :</p>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="card-content-item">
                        <p>Œuvre 1</p>
                        <p>arrangement</p>
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
                        <p>Œuvre 2</p>
                        <p>arrangement</p>
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
                        <p>Œuvre 3</p>
                        <p>arrangement</p>
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
        </div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title"><?php _p("Liste des interprétations"); ?></p>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="card-content-item">
                        <p>Œuvre 1</p>
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
                        <p>Œuvre 2</p>
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
                        <p>Œuvre 3</p>
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
                <p class="card-header-title"><?php _p("Liste des albums du groupe :"); ?></p>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="card-content-item">
                        <p>Album 1</p>
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
                        <p>Album 2</p>
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
                        <p>Album 3</p>
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
        </div>
        <div class="card">
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
        </div>
    </div><!-- first column ends here-->
	<div class="column is-3 is-offset-5">
		<div class="card">
			<header class="card-header">
				<p class="card-header-title"><?php _p("Tags"); ?></p>
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
					</uL>
				</div>
			</div>
		</div>
	</div><!-- second column column ends here-->
</div><!-- all columns end here-->

<div class="item-accessoires is-full">
	<div class="card infosprincipales">
	  <header class="card-header">
	    <div class="card-header-title">
		    <div class="tags are-medium">
			  <span class="tab is-active"><?php _p("10 items les plus vus"); ?></span>
			  <span class="tab"><?php _p("10 items au hasard"); ?></span>
			  <span class="tab"><?php _p("Voir tous"); ?></span>
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
					        <p class="title is-4"><?php _p("Titre"); ?></p>
					      </div>
					    </div>
					    <div class="content">
					      <?php _p("Début de description"); ?>
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

</style>