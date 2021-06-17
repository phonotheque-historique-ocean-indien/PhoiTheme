<?php
/* ----------------------------------------------------------------------
 * themes/default/views/LoginReg/form_login_html.php
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2013-2017 Whirl-i-Gig
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
 
	$vn_label_col = 2;
	if($this->request->isAjax()){
		$vn_label_col = 4;
?>
		<div id="caFormOverlay"><div class="pull-right pointer" onclick="caMediaPanel.hidePanel(); return false;"><span class="glyphicon glyphicon-remove-circle"></span></div>
<?php
	}
?>
			<div class="container">
				<H2><?php _p("Connexion"); ?></H2>
			<form id="LoginForm" action="<?php print caNavUrl($this->request, "", "LoginReg", "login"); ?>" class="phoi-form-login" role="form" method="POST">
				<?php
				if($this->getVar("message")){
					print "<div class=\"notification is-danger\"><button class=\"delete\"></button>".$this->getVar("message")."</div>";
				}
				?>
				<input type="hidden" name="crsfToken" value="<?php print caGenerateCSRFToken($this->request); ?>"/>
				<div>
				<label><?php _p("Identifiant ou e-mail"); ?></label><br/>
					<p class="control has-icons-left">
						<input class="input" type="text" placeholder="identifiant" id="username" name="username" autocomplete="off" >
						<span class="icon is-small is-left"><i class="fas fa-user"></i></span>
					</p>
				</div>

				<div>
				<label><?php _p("Mot de passe"); ?></label>
					<p class="control has-icons-left">
						<input class="input" type="password" name="password" placeholder="Password">
						<span class="icon is-small is-left"><i class="fas fa-lock"></i></span>
					</p>
				</div>

				<button class="button  is-primary is-fullwidth" type="submit"><?php _p("Connexion"); ?></button>
<?php
				if($this->request->isAjax()){
				
					if (!$this->request->config->get(['dontAllowRegistrationAndLogin', 'dont_allow_registration_and_login']) && !$this->request->config->get('dontAllowRegistration')) {
?>
					<a href="#" onClick="jQuery('#caMediaPanelContentArea').load('<?php print caNavUrl($this->request, '', 'LoginReg', 'registerForm', null); ?>');"><?php _p("Pas encore de compte ? S'inscrire"); ?></a>
					<br/>
<?php
					}
?>
					<a href="#" onClick="jQuery('#caMediaPanelContentArea').load('<?php print caNavUrl($this->request, '', 'LoginReg', 'resetForm', null); ?>');"><?php _p("Mot de passe oublié ? Cliquer ici"); ?></a>
<?php
				}else{
					if (!$this->request->config->get(['dontAllowRegistrationAndLogin', 'dont_allow_registration_and_login']) && !$this->request->config->get('dontAllowRegistration')) {
						print "<div>".caNavLink($this->request, _t("Pas encore de compte ? S'inscrire"), "", "", "LoginReg", "registerForm", array())."</div>";
					}
					print "<div>".caNavLink($this->request, _t("Mot de passe oublié ? Cliquer ici"), "", "", "LoginReg", "resetForm", array())."</div>";
				}
?>
					</div>
			</form>
<?php
	if($this->request->isAjax()){
?>
			</div>

		</div><!-- end caFormOverlay -->
<script type='text/javascript'>
	jQuery(document).ready(function() {
		jQuery('#LoginForm').on('submit', function(e){		
			jQuery('#caMediaPanelContentArea').load(
				'<?php print caNavUrl($this->request, '', 'LoginReg', 'login', null); ?>',
				jQuery('#LoginForm').serialize()
			);
			e.preventDefault();
			return false;
		});

		$("button.delete").on("click", function() {
			console.log($(this));
		});
	});

</script>
<?php
	} else {
?>
	<script type='text/javascript'>
		jQuery(document).ready(function() {
			$("button.delete").on("click", function() {
				$(this).parent().remove();
			});
		});

	</script>
<?php
}
?>
