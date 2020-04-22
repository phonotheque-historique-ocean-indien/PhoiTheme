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

<!-- ca_entities_org_html.php -->

<h1 class="titre-groupe">{{{^ca_entity_labels.displayname}}}</h1>

<div class="columns">
    <div class="column is-one-third">
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
                    <b>Début le :</b> {{{ }}}<br /><!-- à compléter pour l'appel de la donnée-->
                    <b>Fin le :</b> {{{ }}})<br /><!-- à compléter pour l'appel de la donnée-->
                    <b>Biographie :</b>
                </div>
            </div>
        </div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">Liste des interprétations :</p>
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
                <p class="card-header-title">Liste des interprétations</p>
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
                <p class="card-header-title">Liste des albums du groupe :</p>
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
                <p class="card-header-title">Liste des événéments du groupe : </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="card-content-item">
                        <p>Événement 1</p>
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
    <div class="column">
        Second column
    </div><!-- second column ends here-->
</div><!-- all columns end here-->

<!-- to do : insert tags right + bottom card -->