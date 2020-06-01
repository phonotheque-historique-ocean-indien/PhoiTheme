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
	if(filter_var($_GET["partie"], FILTER_SANITIZE_STRING) == "froide") {
		$_SESSION["partie"] = "froide";
	}
	if(filter_var($_GET["partie"], FILTER_SANITIZE_STRING) == "chaude") {
		$_SESSION["partie"] = "chaude";
	}
	if(!isset($_SESSION["partie"])) $_SESSION["partie"]="chaude";
	$va_lightboxDisplayName = caGetLightboxDisplayName();
	$vs_lightbox_sectionHeading = ucFirst($va_lightboxDisplayName["section_heading"]);
	$va_classroomDisplayName = caGetClassroomDisplayName();
	$vs_classroom_sectionHeading = ucFirst($va_classroomDisplayName["section_heading"]);

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
	<title>Phonothèque Historique de l'Océan Indien</title>
	<?php print MetaTagManager::getHTML(); ?>
	<?php print AssetLoadManager::getLoadHTML($this->request); ?>

	<title><?php print (MetaTagManager::getWindowTitle()) ? MetaTagManager::getWindowTitle() : $this->request->config->get("app_display_name"); ?></title>

	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#browse-menu').on('click mouseover mouseout mousemove mouseenter',function(e) { e.stopPropagation(); });
		});
	</script>
	<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.7.95/css/materialdesignicons.min.css">
	<script src="https://kit.fontawesome.com/03715dce34.js" crossorigin="anonymous"></script>
</head>
<body class="<?php print $_SESSION["partie"]; ?>">
<div id="phoi-logo-top">
	<div class="container" id="phoi-logo-container">
        <?php if($_SESSION["partie"] == "chaude"): ?>
        <a href="/"><img class="logo" src="<?php print ($_SESSION["partie"] == "froide" ? __CA_URL_ROOT__."/logo-white.png" : __CA_URL_ROOT__."/logo.png" ); ?>" /></a>
        <?php else : ?>
        <a href="/index.php/Phonotheque/Partenaires?partie=froide"><img class="logo" src="<?php print ($_SESSION["partie"] == "froide" ? __CA_URL_ROOT__."/logo-white.png" : __CA_URL_ROOT__."/logo.png" ); ?>" /></a>
        <?php endif; ?>
        <nav class="navbar pull-right user-and-lang">
            <?php if($this->request->isLoggedIn()): ?>
            <a class="navbar-item" href="/index.php/LoginReg/loginForm"><span class="icon" style="font-size:30px;"><i class="mdi mdi-account-circle is-large"></i></span> Mon compte</a>
            <a class="navbar-item" href="/index.php/LoginReg/loginForm"><span class="icon" style="font-size:30px;"><i class="mdi mdi-account-box-outline is-large"></i></span> Mon espace</a>
            <a class="navbar-item" href="/index.php/LoginReg/logout"><span class="icon" style="font-size:30px;"><i class="mdi mdi-logout is-large"></i></span> Déconnexion</a>
            <?php else : ?>
            <a class="navbar-item" href="/index.php/LoginReg/loginForm"><span class="icon" style="font-size:30px;"><i class="mdi mdi-login is-large"></i></span> Connexion</a>
            <a class="navbar-item" href="/index.php/LoginReg/registerForm"><span class="icon" style="font-size:30px;"><i class="mdi mdi-account-plus is-large"></i></span> Inscription</a>
            <?php endif; 
	            if($lang=="si"):
            ?>
            <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="/index.php/Front/index/lang/si">SHIBUSHI</a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="/index.php/Front/index/lang/fr_FR">FRANÇAIS</a>
                    <a class="navbar-item" href="/index.php/Front/index/lang/en_US">ENGLISH</a>
                </div>
            </div>
	        <?php elseif($lang=="en_US"): ?>
            <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="/index.php/Front/index/lang/en_US">ENGLISH</a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="/index.php/Front/index/lang/fr_FR">FRANÇAIS</a>
                    <a class="navbar-item" href="/index.php/Front/index/lang/si">SHIBUSHI</a>
                </div>
            </div>
	        <?php else: ?>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link" href="/index.php/Front/index/lang/fr_FR">FRANÇAIS</a>
                <div class="navbar-dropdown is-boxed">
                    <a class="navbar-item" href="/index.php/Front/index/lang/si">SHIBUSHI</a>
                    <a class="navbar-item" href="/index.php/Front/index/lang/en_US">ENGLISH</a>
                </div>
            </div>
	        <?php endif; ?>
        </nav>
	</div>
</div>
<?php if($_SESSION["partie"] == "froide"): ?>
	<nav class="navbar navbar-froide navbar-main">
		<div class="container">

			<div id="navbarExampleTransparentExample" class="navbar-menu">
				<div class="navbar-end">
					<a class="navbar-item" href="<?php print __CA_URL_ROOT__; ?>/index.php/Search/objects?search=*"><span class="icon" style="font-size:30px;"><i class="mdi mdi-magnify is-large"></i></span></a>
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">Gestion des items</a>
						<div class="navbar-dropdown is-boxed">
							<a href="https://phoi.ideesculture.fr/index.php/Detail/objects/130" class="navbar-item">Phonogramme</a>
							<a class="navbar-item">Collectage</a>
							<a class="navbar-item">Partitions</a>
							<a class="navbar-item">Création musicale</a>
							<a class="navbar-item">Interprétation</a>
							<a class="navbar-item" href="/index.php/Contribuer/Do/Form/table/ca_objects/type/issue">Formulaire ajout 1</a>
							<a class="navbar-item" href="/index.php/Contribuer/Do/Form/table/ca_places/type/city">Formulaire ajout 2</a>
						</div>
					</div>
					<div class="navbar-item has-dropdown is-hoverable">
						<a href="https://phoi.ideesculture.fr/index.php/Thesaurus/View/Index" class="navbar-link">
							Gestion du thesaurus</a>
											</div>
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">
							Gestion des utilisateurs</a>
					</div>

					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">Blockchain</a>

					</div>
					<div class="navbar-item">
						<div class="field is-grouped">
							<p class="control">
								<a class="button is-danger" href="/index.php/Articles/Front/index?partie=chaude">
                  <span class="icon">
                    <i class="mdi mdi-18px mdi-map-outline"></i>
                  </span>
									<span>Visite</span></a>
							</p>
						</div>
					</div>
				</div>

			</div>
			<a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
				<span aria-hidden="true"></span>
			</a>
		</div>

	</nav>
<?php else: ?>
	<nav class="navbar navbar-chaude navbar-main">
		<div class="container">

			<div id="navbarExampleTransparentExample" class="navbar-menu">
				<div class="navbar-end">
					<a class="navbar-item"><span class="icon" style="font-size:30px;"><i class="mdi mdi-magnify is-large"></i></span></a>
					<div class="navbar-item has-dropdown is-hoverable">
						<a href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Articles/Show/index" class="navbar-link articles"><?php _p("Articles"); ?></a>
					</div>
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link phonotheque" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Expositions/Show/index">Expositions</a>
					</div>					
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link playlists" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/About/Playlists"><?php _p("Playlists"); ?></a>
					</div>
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link podcasts" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Podcasts/Show/index"><?php _p("Podcasts"); ?></a>
<!--	Dropdown menu for Podcasts is not needed for the moment
                            <div class="navbar-dropdown is-boxed">-->
<!--							<a class="navbar-item">Connexion</a>-->
<!--							<a class="navbar-item">Espace personnel</a>-->
<!--						</div>-->
					</div>
					
				
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link phonotheque"><?php _p("The Sound Archive"); ?></a>
						<div class="navbar-dropdown is-boxed">
							<a class="navbar-item" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Phonotheque/Partenaires">Les partenaires</a>
							<a class="navbar-item" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Phonotheque/CadreJuridique">Le cadre juridique</a>
							<a class="navbar-item" href="<?php _p(__CA_URL_ROOT__); ?>/index.php/Phonotheque/RevueDePresse">La revue de presse</a>
						</div>
					</div>
					<div class="navbar-item">
						<div class="field is-grouped">
							<p class="control">
								<a class="button is-link" href="/index.php/Phonotheque/Partenaires?partie=froide">
                  <span class="icon">
                    <i class="mdi mdi-18px mdi-map-outline"></i>
                  </span>
									<span><?php _p("Archives"); ?></span></a>
							</p>
						</div>
					</div>
				</div>

			</div>
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
	});

	$(".navbar-burger").click(function() {

		// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
		$(".navbar-burger").toggleClass("is-active");
		$(".navbar-menu").toggleClass("is-active");

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

	</style>
<div class="container">
