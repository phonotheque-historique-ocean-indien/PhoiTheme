<?php
/* ----------------------------------------------------------------------
 * themes/default/views/LoginReg/form_register_html.php
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
 
	$va_errors = $this->getVar("errors");
	$t_user = $this->getVar("t_user");
	$co_security = $this->request->config->get('registration_security');
	if($co_security == 'captcha'){
		if(strlen($this->request->config->get('google_recaptcha_sitekey')) != 40 || strlen($this->request->config->get('google_recaptcha_secretkey')) != 40){
			//Then the captcha will not work and should not be implemenented. Alert the user in the console
			print "<script>console.log('reCaptcha disabled, please provide a valid site_key and secret_key to enable it.');</script>";
			$co_security = 'equation_sum';
		}
	}
?>
<script type="text/javascript">
	// initialize CA Utils
	caUI.initUtils();

</script>
<?php
	if($co_security == 'captcha'){
?>
		<script type="text/javascript">
			var gCaptchaRender = function(){
                grecaptcha.render('regCaptcha', {'sitekey': '<?php print $this->request->config->get('google_recaptcha_sitekey'); ?>'});
        	};
		</script>
<?php
	}
?>
<h2><?php _p("Inscription"); ?></h2>
<?php if(sizeof($va_errors)): ?>
	<div class="notification is-primary">
  <button class="delete" onClick="$('.notification').hide();"></button>
  <?php foreach($va_errors as $error=>$msg): ?>
	<strong><?= $error; ?></strong> : <?= $msg; ?><br/>
  <?php endforeach; ?>
</div>
<?php endif; ?>
	<form id="RegForm" action="<?php print caNavUrl($this->request, "", "LoginReg", "register"); ?>" class="form-horizontal" role="form" method="POST">
	    <input type="hidden" name="crsfToken" value="<?php print caGenerateCSRFToken($this->request); ?>"/>

<?php
	if($va_errors["register"]){
		print "<div class='alert alert-danger'>".$va_errors["register"]."</div>";
	}
		foreach(array("fname", "lname", "email") as $vs_field){
			if($va_errors[$vs_field]){
				print "<div class='alert alert-danger'>".$va_errors[$vs_field]."</div>";
			}	
			print $t_user->htmlFormElement($vs_field,"<div class='form-group".(($va_errors[$vs_field]) ? " has-error" : "")."'><label for='".$vs_field."' class='col-sm-4 control-label'>^LABEL</label><div class='col-sm-7'>^ELEMENT</div><!-- end col-sm-7 --></div><!-- end form-group -->\n", array("classname" => "form-control"));
		}
		$va_profile_settings = $this->getVar("profile_settings");
		if(is_array($va_profile_settings) and sizeof($va_profile_settings)){
			foreach($va_profile_settings as $vs_field => $va_profile_element){
				if($va_errors[$vs_field]){
					print "<div class='alert alert-danger'>".$va_errors[$vs_field]."</div>";
				}
				print "<div class='form-group".(($va_errors[$vs_field]) ? " has-error" : "")."'>";
				print $va_profile_element["bs_formatted_element"];
				print "</div><!-- end form-group -->";
			}
		}
		if($va_errors["password"]){
			print "<div class='alert alert-danger'>".$va_errors["password"]."</div>";
		}
		if($va_errors["captcha"]){
			print "<div class='alert alert-danger'>Veuillez réessayer.</div>";
		}
		print $t_user->htmlFormElement("password","<div class='form-group".(($va_errors["password"]) ? " has-error" : "")."'><label for='password' class='col-sm-4 control-label'>^LABEL</label><div class='col-sm-7'>^ELEMENT</div><!-- end col-sm-7 --></div><!-- end form-group -->\n", array("classname" => "form-control"));
		
?>
		<div class="form-group<?php print (($va_errors["password"]) ? " has-error" : ""); ?>">
			<label for='password2' class='col-sm-4 control-label'><?php print _t('Re-Type password'); ?></label>
			<div class="col-sm-7"><input type="password" name="password2" size="40" class="form-control"  autocomplete="off" /></div><!-- end col-sm-7 -->
		</div><!-- end form-group -->
		<input type="hidden" name="sum" value="<?php print $vn_sum; ?>">

		<div class="elem-group">
			<label for="captcha"><?php _p("Sur cette image, un seul cercle n'est pas fermé. Veuillez cliquer dessus."); ?></label>
			<br/>
			<div id="captcha" style="height:240px;width:600px;background-color:rgba(0,0,0,0.01);" ></div>
			<div>
				<a href="https://www.phoi.io/index.php/LoginReg/registerForm">
				<span style="line-height:20px;">
					<p><img style="margin-bottom:-4px;border:none;" src="/reload.svg"><?php _p("Impossible de trouver le cercle ouvert ?"); ?> <?php _p("Générer un autre captcha."); ?>
				</span>
				</a>
			</div>

			<div id="captcha-message"></div>
		</div>
		<button type="submit" id="submit" disabled="disabled" class="button is-primary is-fullwidth disabled"><?php _p("Enregistrement"); ?></button>

	</form>
</div><!-- end caFormOverlay -->
<script type='text/javascript'>
var captcha = {};
$(document).ready(function(){
  $.ajax({
    url: "/captcha2.php"
  }).done(function(data) {
    $("#captcha").append("<img class='captchaimage' src='data:image/png;charset=utf-8;base64,"+data.image+"' />");
    captcha.x = data.x;
    captcha.y = data.y;
    captcha.size = Math.round(data.size / 2);
    console.log(captcha);
    //console.log(data.angle);
    //console.log("x "+data.x);
    console.log(data.y);
  });

  $("#captcha").on("click", ".captchaimage",function(event) {
    console.log("clicked");

    let xclicked = event.offsetX - 20;
    let yclicked = event.offsetY;
    let minx = captcha.x - captcha.size;
    let maxx = captcha.x + captcha.size;
    let miny = captcha.y - captcha.size;
    let maxy = captcha.y + captcha.size;
	console.log(minx);
	console.log(maxx);
	console.log(miny);
	console.log(maxy);
	console.log(xclicked);
	console.log(yclicked);
    if(((xclicked>minx) && (xclicked<maxx))  && ((yclicked>miny) && (yclicked<maxx))) {
		$("#captcha-message").html("Votre clic a bien été enregistré. <small style='color:lightgray'>["+xclicked+","+yclicked+"]</small>");
		$("#submit").removeClass("disabled");
		$("#submit").removeAttr("disabled");
    }
    /*if((yclicked < (captcha.y - captcha.size)) && (yclicked > (captcha.y + captcha.size))) {
      console.log("clic hors zone");
    }*/
  });
});

jQuery(document).ready(function() {
	$("input[name='pref_user_profile_confiance']").parent().parent().hide();
	$("textarea[name='pref_user_profile_image']").parent().parent().hide();
	$("input[name='pref_user_profile_date_creation']").parent().parent().hide();
});

var refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function() {
	location.reload();
}
</script>

