<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageHeader.php :
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2014-2017 Whirl-i-Gig
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
	session_start();

	require_once(__CA_MODELS_DIR__."/ca_object_representations.php");
	$va_lightboxDisplayName = caGetLightboxDisplayName();
	$vs_lightbox_sectionHeading = ucFirst($va_lightboxDisplayName["section_heading"]);
	$va_classroomDisplayName = caGetClassroomDisplayName();
	$vs_classroom_sectionHeading = ucFirst($va_classroomDisplayName["section_heading"]);

	$url = $this->request->getRequestUrl();
	$urlPart = explode("/", $url)[1];
	switch($urlPart) {
		case "Articles":
			$partie = "chaude";
			break;
		case "Phoi" :
		case "Thesaurus" :
		case "Detail" :
			$partie = "froide";
			break;
		case "Contribuer":
			$partie = "froide";
			break;
		default :
			$partie = "chaude";
	}


	$is_admin = false;
	$is_logged_in = false;
	
	$roles= $this->request->user->get("ca_user_roles.code");
	if(strpos($roles, "admin") !== false) {
		
		$is_admin = true;
	}
	$is_logged_in = $this->request->isLoggedIn();
	 

	# Collect the user links: they are output twice, once for toggle menu and once for nav
	$va_user_links = array();
	if($this->request->isLoggedIn()){
		$va_user_links[] = '<li role="presentation" class="dropdown-header">'.trim($this->request->user->get("fname")." ".$this->request->user->get("lname")).', '.$this->request->user->get("email").'</li>';
		$va_user_links[] = '<li class="divider nav-divider"></li>';
		if(caDisplayLightbox($this->request)){
			$va_user_links[] = "<li>".caNavLink($this->request, $vs_lightbox_sectionHeading, '', '', 'Lightbox', 'Index', array())."</li>";
		}
		if(caDisplayClassroom($this->request)){
			$va_user_links[] = "<li>".caNavLink($this->request, $vs_classroom_sectionHeading, '', '', 'Classroom', 'Index', array())."</li>";
		}
		$va_user_links[] = "<li>".caNavLink($this->request, _t('User Profile'), '', '', 'LoginReg', 'profileForm', array())."</li>";
		$va_user_links[] = "<li>".caNavLink($this->request, _t('Logout'), '', '', 'LoginReg', 'Logout', array())."</li>";
	} else {
		if (!$this->request->config->get(['dontAllowRegistrationAndLogin', 'dont_allow_registration_and_login']) || $this->request->config->get('pawtucket_requires_login')) { $va_user_links[] = "<li><a href='#' onclick='caMediaPanel.showPanel(\"".caNavUrl($this->request, '', 'LoginReg', 'LoginForm', array())."\"); return false;' >"._t("Login")."</a></li>"; }
		if (!$this->request->config->get(['dontAllowRegistrationAndLogin', 'dont_allow_registration_and_login']) && !$this->request->config->get('dontAllowRegistration')) { $va_user_links[] = "<li><a href='#' onclick='caMediaPanel.showPanel(\"".caNavUrl($this->request, '', 'LoginReg', 'RegisterForm', array())."\"); return false;' >"._t("Register")."</a></li>"; }
	}
	$vb_has_user_links = (sizeof($va_user_links) > 0);

	$lang = $this->request->getParameter("lang", pString);
	if(!$lang) {
		$lang = Zend_Registry::get('Zend_Locale');
	}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php print MetaTagManager::getHTML(); ?>
	<?php print AssetLoadManager::getLoadHTML($this->request); ?>

	<title><?php print (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get("app_display_name"); ?></title>

	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#browse-menu').on('click mouseover mouseout mousemove mouseenter',function(e) { e.stopPropagation(); });
		});
	</script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@6.4.95/css/materialdesignicons.min.css">
	<script src="https://kit.fontawesome.com/03715dce34.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.8.0/viewer.min.js" integrity="sha512-0Wn9X6EqYvivEQ+TqPycd7e2Py2FTP6ke9/v6CWFwg0+5G9lgRV4SyR7BApYriLL8dLB1OscA+8LrYA/X6wm3w==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/viewerjs/1.8.0/viewer.min.css" integrity="sha512-i7JFM7eCKzhlragtp4wNwz36fgRWH/Zsm3GAIqqO2sjiSlx7nQhx9HB3nmQcxDHLrJzEBQJWZYQQ2TPfexAjgQ==" crossorigin="anonymous" />
	<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
	<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.js"></script>	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@creativebulma/bulma-tooltip@1.2.0/dist/bulma-tooltip.css" />

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">	
</head>
<body class="<?php print $partie." ".($is_logged_in ? "loggedin" : "anonymous"); ?> ">
<div id="phoi-logo-top">
	<div class="container" id="phoi-logo-container">
        <?php if($partie == "chaude"): ?>
        <a href="/index.php"><img class="logo" src="<?= __CA_URL_ROOT__."/logo.png" ?>" /></a>
        <?php else : ?>
        <a href="/index.php/Phoi/Partenaires/Carte?partie=froide"><img class="logo" src="<?php print ($partie == "froide" ? __CA_URL_ROOT__."/logo-white.png" : __CA_URL_ROOT__."/logo.png" ); ?>" /></a>
        <?php endif; ?>
        <nav class="navbar pull-right user-and-lang">
		<a class="navbar-item au-hasard" ><span class="icon" style="font-size:30px;"><i class="mdi mdi-play-circle-outline is-large"></i></span> Au hasard</a>
            <?php if($this->request->isLoggedIn()): ?>
            <a class="navbar-item" href="/index.php/Phoi/MonEspace/Index"><span class="icon" style="font-size:30px;"><i class="mdi mdi-account-box-outline is-large"></i></span> Mon espace</a>
            <a class="navbar-item" href="/index.php/LoginReg/logout"><span class="icon" style="font-size:30px;"><i class="mdi mdi-logout is-large"></i></span> Déconnexion</a>
            <?php else : ?>
            <a class="navbar-item" href="/index.php/LoginReg/loginForm"><span class="icon" style="font-size:30px;"><i class="mdi mdi-login is-large"></i></span> Connexion</a>
            <a class="navbar-item" href="/index.php/LoginReg/registerForm"><span class="icon" style="font-size:30px;"><i class="mdi mdi-account-plus is-large"></i></span> Inscription</a>
            <?php endif; ?>

			<?php if($partie == "chaude"): ?>
			<div class="navbar-main-items" style="">
					<!-- <a class="navbar-item"><span class="icon" style="font-size:30px;"><i class="mdi mdi-magnify is-large"></i></span></a> -->
					<div class="navbar-item has-dropdown is-hoverable articles">
						<a href="/index.php/Articles/Show/index" class="navbar-link articles">Articles</a>
					</div>
					<div class="navbar-item has-dropdown is-hoverable expositions">
						<a class="navbar-link phonotheque" href="/index.php/Expositions/Show/index">Expositions</a>
					</div>
					<div class="navbar-item has-dropdown is-hoverable playlists">
						<a class="navbar-link playlists" href="/index.php/Playlists/Show/index">Playlists</a>
					</div>
					<div class="navbar-item has-dropdown is-hoverable podcasts">
						<a class="navbar-link podcasts" href="/index.php/Podcasts/Show/index">Podcasts</a>
					</div>
					<div class="navbar-item has-dropdown is-hoverable phonotheque">
						<a class="navbar-link phonotheque">La Phonothèque</a>
						<div class="navbar-dropdown is-boxed">
							<a class="navbar-item" href="/index.php/Phonotheque/Partenaires">Les partenaires</a>
							<a class="navbar-item" href="/index.php/Phonotheque/CGU">Le cadre juridique</a>
							<a class="navbar-item" href="/index.php/Phonotheque/RevueDePresse">La revue de presse</a>
							<a class="navbar-item" href="/index.php/Contact/Form">Contact</a>
						</div>
					</div>
					<div class="navbar-item">
						<div class="field is-grouped">
							<p class="control bouton-archives">
								<a class="button is-link" href="/index.php/Phoi/Partenaires/Carte?partie=froide">
									<span class="icon">
										<i class="mdi mdi-18px mdi-map-outline"></i>
									</span>
									<span>Archives</span></a>
							</p>
						</div>
					</div>
			</div>
			<?php else : ?>
				<div class="navbar-main-items" style="">
				<a class="navbar-item" style="margin-right:30px" href="https://www.phoi.io/index.php/Phoi/Partenaires/Carte?partie=froide"><span class="icon" style="font-size:30px;"><i class="mdi mdi-map-search-outline is-large"></i></span></a>
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">Items</a>
						<div class="navbar-dropdown is-boxed">
							<a href="/index.php/Phoi/Phonogrammes/Search" class="navbar-item"><i class="mdi mdi-album is-large"></i> Phonogrammes</a>
							<a href="/index.php/Phoi/Collectages/Search" class="navbar-item">Collectages</a>
							<a href="/index.php/Phoi/Partitions/Search" class="navbar-item">Partitions</a>
							<a href="/index.php/Phoi/Creations/Search" class="navbar-item">Créations musicales</a>
							<a href="/index.php/Phoi/Interpretations/Search" class="navbar-item">Interprétations</a>
							<a href="/index.php/Phoi/Personnes/Search" class="navbar-item">Personnes</a>
							<a href="/index.php/Phoi/Groupes/Search" class="navbar-item">Groupes</a>
							<a href="/index.php/Phoi/Livres/Search" class="navbar-item">Livres</a>
						</div>
					</div>
					<div class="navbar-item has-dropdown is-hoverable">
						<a href="/index.php/Thesaurus/View/Index" class="navbar-link">
							Thésaurus</a>
											</div>
<?php if($is_admin): ?>
					<div class="navbar-item has-dropdown is-hoverable">
						<a href="/index.php/Phoi/Users/List" class="navbar-link">
							Utilisateurs</a>
					</div>
<?php endif; ?>
					<div class="navbar-item has-dropdown is-hoverable">
						<a href="/index.php/Phoi/Moderation/List" class="navbar-link">Contributions</a>

					</div>
					<div class="navbar-item">
						<div class="field is-grouped">
							<p class="control bouton-visite">
								<a class="button is-danger" href="/index.php/Articles/Front/index?partie=chaude">
                  <span class="icon">
                    <i class="mdi mdi-18px mdi-calendar-text-outline"></i>
                  </span>
									<span>Visite</span></a>
							</p>
						</div>
					</div>
				</div>
			<?php endif; ?>

            <div class="navbar-item navbar-lang has-dropdown is-hoverable">
                <a class="navbar-link" href="?lang=fr_FR">FRANÇAIS</a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="?lang=si">SHIBUSHI</a>
                    <a class="navbar-item" href="?lang=en_US">ENGLISH</a>
					<a class="navbar-item" href="?lang=my">MALAGASY</a>
                </div>
            </div>
        </nav>
	</div>
</div>
<?php if($partie == "froide"): ?>
	<nav class="navbar navbar-froide navbar-main" style="z-index:50 !important;">
		<div class="container">

			<div id="navbarExampleTransparentExample" class="navbar-menu">
				<div class="navbar-end">
					<a class="navbar-item" style="margin-right:30px" href="https://www.phoi.io/index.php/Phoi/Partenaires/Carte?partie=froide"><span class="icon" style="font-size:30px;"><i class="mdi mdi-map-search-outline is-large"></i></span></a>
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">Items</a>
						<div class="navbar-dropdown is-boxed">
							<a href="/index.php/Phoi/Phonogrammes/Search" class="navbar-item"><i class="mdi mdi-disc-player is-large"></i> Phonogrammes</a>
							<a href="/index.php/Phoi/Collectages/Search" class="navbar-item"><i class="mdi mdi-microphone-variant is-large"></i>Collectages</a>
							<a href="/index.php/Phoi/Partitions/Search" class="navbar-item"><i class="mdi mdi-playlist-music is-large"></i> Partitions</a>
							<a href="/index.php/Phoi/Creations/Search" class="navbar-item"><i class="mdi mdi-music-box-multiple-outline is-large"></i> Créations musicales</a>
							<a href="/index.php/Phoi/Interpretations/Search" class="navbar-item"><i class="mdi mdi-account-music is-large"></i> Interprétations</a>
							<a href="/index.php/Phoi/Personnes/Search" class="navbar-item"><i class="mdi mdi-account is-large"></i> Personnes</a>
							<a href="/index.php/Phoi/Groupes/Search" class="navbar-item"><i class="mdi mdi-account-group is-large"></i> Groupes</a>
							<a href="/index.php/Phoi/Livres/Search" class="navbar-item"><i class="mdi mdi-book-open-variant is-large"></i>Livres</a>
						</div>
					</div>
					<div class="navbar-item has-dropdown is-hoverable">
						<a href="/index.php/Thesaurus/View/Index" class="navbar-link">
							Thésaurus</a>
											</div>
<?php if($is_admin): ?>
					<div class="navbar-item has-dropdown is-hoverable">
						<a href="/index.php/Phoi/Users/List" class="navbar-link">
							Utilisateurs</a>
					</div>
<?php endif; ?>
					<div class="navbar-item has-dropdown is-hoverable">
						<a href="/index.php/Phoi/Moderation/List" class="navbar-link">Contributions</a>

					</div>
					<div class="navbar-item">
						<div class="field is-grouped">
							<p class="control">
								<a class="button is-danger" href="/index.php/Articles/Front/index?partie=chaude">
                  <span class="icon">
                    <i class="mdi mdi-18px mdi-calendar-text-outline"></i>
                  </span>
									<span>Visite</span></a>
							</p>
						</div>
					</div>
				</div>

			</div>
			<a id="logo-responsive" href="/index.php"><img src="/logo-white2.png"></a>
			<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>

	</nav>
<?php else: ?>
	<nav class="navbar navbar-chaude navbar-main" style="z-index:50 !important;">
		<div class="container">
			<div id="navbarExampleTransparentExample" class="navbar-menu">
				<div class="navbar-end">
					<!-- <a class="navbar-item"><span class="icon" style="font-size:30px;"><i class="mdi mdi-magnify is-large"></i></span></a> -->
					<div class="navbar-item has-dropdown is-hoverable articles">
						<a href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Articles/Show/index" class="navbar-link articles"><?php _p("Articles"); ?></a>
					</div>
					<div class="navbar-item has-dropdown is-hoverable expositions">
						<a class="navbar-link phonotheque" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Expositions/Show/index">Expositions</a>
					</div>
					<div class="navbar-item has-dropdown is-hoverable playlists">
						<a class="navbar-link playlists" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Playlists/Show/index"><?php _p("Playlists"); ?></a>
					</div>
					<div class="navbar-item has-dropdown is-hoverable podcasts">
						<a class="navbar-link podcasts" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Podcasts/Show/index"><?php _p("Podcasts"); ?></a>
					</div>


					<div class="navbar-item has-dropdown is-hoverable phonotheque">
						<a class="navbar-link phonotheque"><?php _p("The Sound Archive"); ?></a>
						<div class="navbar-dropdown is-boxed">
							<a class="navbar-item" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Phonotheque/Partenaires">Les partenaires</a>
							<a class="navbar-item" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Phonotheque/CGU">Le cadre juridique</a>
							<a class="navbar-item" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Phonotheque/RevueDePresse">La revue de presse</a>
							<a class="navbar-item" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Contact/Form">Contact</a>
						</div>
					</div>
					<div class="navbar-item">
						<div class="field is-grouped">
							<p class="control">
								<a class="button is-link" href="/index.php/Phoi/Partenaires/Carte?partie=froide">
                  <span class="icon">
                    <i class="mdi mdi-18px mdi-map-outline"></i>
                  </span>
									<span><?php _p("Archives"); ?></span></a>
							</p>
						</div>
					</div>
				</div>

			</div>
			<a id="logo-responsive" href="/index.php"><img src="/logo.png"></a>
			<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>

	</nav>
<?php endif; ?>
<script>
	var menuShrinked = false;
	var menuShrinking = false;
	$(window).scroll(function () {
		if($(window).width()>1024) {
			console.log("$(window).scroll", $(window).width());
			var elem = $('#phoi-logo-container');
			var elem2 = $('nav.user-and-lang');
			$(window).scroll(function() {
				if(!menuShrinked && (window.scrollY > 0) && (!menuShrinking)) {
					elem.addClass("phoi-logo-shrinked");
					elem2.addClass("user-and-lang-shrinked");
					menuShrinking=true;
					elem.animate({"height":"50px"}, 1000, function() {
						menuShrinking=false;
					});
					menuShrinked=true;
				};
				if(menuShrinked && (window.scrollY == 0) && (!menuShrinking)) {
					menuShrinked=false;
					elem.removeClass("phoi-logo-shrinked");
					elem2.removeClass("user-and-lang-shrinked");
					menuShrinking=true;
					elem.animate({"height":"157px"}, 1000, function() {
						menuShrinking=false;
					});
				}
			});
		}
	});

	$(document).ready(function() {
		if($(window).width()<1024) {
			$('#phoi-logo-container').addClass("phoi-logo-shrinked");
			$('nav.user-and-lang').addClass("user-and-lang-shrinked");
		}
	});

	$(".navbar-burger").click(function() {

		// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
		$(".navbar-burger").toggleClass("is-active");
		$(".navbar-menu").toggleClass("is-active");
		$("nav.user-and-lang").slideToggle();
	});

	var playlistLoadTrack = function(name, url, image, artist="", album="") {
        //loadTrack(name, url, image=null, artist="", album="")
        if(artist == "") artist="playlist";
        if(album == "") album="Playlist PHOI";
		parent.parent.loadTrack(name, url, image, artist, album);
		parent.parent.playTrack();
	}

	$(".navbar-burger").click(function() {
		// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
		$(".navbar-burger").toggleClass("is-active");
		$(".navbar-menu").toggleClass("is-active");
	});

	$(".au-hasard").click(function() {
		console.log("Au hasard");
		$.get("<?= __CA_URL_ROOT__ ?>/playlist_random_track.php", function(data){
			playlistLoadTrack(data.titre, data.url, data.icone, data.artist, data.album);
		})
		window.setTimeout(function() {
			document.getElementById('audio-player').src += '';
		}, 1150);
		
	});


</script>
<style>
body.froide	a.navbar-item:focus, a.navbar-item:focus-within, a.navbar-item:hover, a.navbar-item.is-active, .navbar-link:focus, .navbar-link:focus-within, .navbar-link:hover, .navbar-link.is-active,
body.froide .navbar-dropdown a.navbar-item:focus, .navbar-dropdown a.navbar-item:hover {
	background-color:#436a7b;
}
body.froide .navbar-dropdown {
	background-color:#598da5;
}
.froide .navbar-main .navbar-item, .froide .navbar-main .navbar-dropdown {
	z-index:12001;
}

	</style>
<div class="container">
