<?php
	if($this->request->isAjax()){
?>
		<div id="caFormOverlay"><div class="pull-right pointer" onclick="caMediaPanel.hidePanel(); return false;"><span class="glyphicon glyphicon-remove-circle"></span></div>
<?php
	}
?>
			<H2>Reset du mot de passe</H2>
<?php
	if($this->getVar("message")){
		print "<div class='alert alert-danger'>".$this->getVar("message")."</div>";
	}
			switch($this->getVar("action")) {
				case 'send':
?>
					<p>
						Des informations vous ont été envoyées à l'adresse email saisie.
					</p>
					<p>
						Vous devriez recevoir ces informations en moins de 15 minutes. Si ce n'était pas le cas, merci de nous contacter :
						 <a href="mailto:<?php print $this->getVar("email"); ?>"><?php print $this->getVar("email"); ?></a>.
					</p>
		<?php
					break;
				
				# ---------------------------------------------------------------------------------------------
				case 'reset_success':
		?>
					<div class='alert alert-success'><?php print _t("Your password has been reset!"); ?></div>
					<p align="center">
						<?php print _t("You may now"); ?> <?php print caNavLink($this->request, _t("login"), "", "", "LoginReg", "loginForm"); ?>.
					</p>
		<?php
					break;
				
				# ---------------------------------------------------------------------------------------------
				case 'reset_failure':
		?>
					<p align="center">
						<?php print _t("Please confirm you have copied the provided link properly.  If you continue to have difficulty, contact us for assistance,"); ?> <a href="mailto:<?php print $this->getVar("email"); ?>"><?php print $this->getVar("email"); ?></a>.
					</p>
		<?php
					break;
				
				# ---------------------------------------------------------------------------------------------	
				case 'reset':
		?>
					<p><?php print _t("Please enter your new password."); ?></p>
					<form id="ResetForm" action="<?php print caNavUrl($this->request, '', 'LoginReg', 'resetSave'); ?>" method="post" class="form-horizontal" role="form" method="POST">


						<div class="form-group">
							<label for="password" class="col-sm-2 control-label"><?php print _t("New password"); ?></label>
							<div class="col-sm-7">
								<input type="password" name="password" class="form-control" id="password" autocomplete="off" />
							</div><!-- end col-sm-7 -->
						</div><!-- end form-group -->
						<div class="form-group">
							<label for="password" class="col-sm-2 control-label"><?php print _t("Confirm new password"); ?></label>
							<div class="col-sm-7">
								<input type="password" name="password_confirm" class="form-control" id="password_confirm" autocomplete="off" />
							</div><!-- end col-sm-7 -->
						</div><!-- end form-group -->
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-7">
								<button type="submit" class="btn btn-default">save</button>
							</div>
						</div><!-- end form-group -->
						<input type="hidden" name="key" value="<?php print $this->getVar("key"); ?>">
						<input type="hidden" name="action" value="reset_save">
					</form><br/>
		<?php
					break;
				
				# ---------------------------------------------------------------------------------------------	
				default:
?>
					<p><?php print _t("To reset your password enter the e-mail address you used to register below. A message will be sent to the address with instructions on how to reset your password."); ?></p>
					<form id="ResetForm" action="<?php print caNavUrl($this->request, '', 'LoginReg', 'resetSend'); ?>" method="post" class="form-horizontal" role="form">
						<div class="form-group">
							<label for="reset_email" class="col-sm-4 control-label"><?php print _t("E-mail"); ?></label>
							<div class="col-sm-7">
								<input type="test" name="reset_email" class="form-control" id="reset_email" autocomplete="off" />
							</div><!-- end col-sm-7 -->
						</div><!-- end form-group -->
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-7">
								<button type="submit" class="btn btn-default">send</button>
							</div>
						</div><!-- end form-group -->
					</form>
<?php				
					break;
				# ---------------------------------------------------------------------------------------------
			}

	if($this->request->isAjax()){
?>
		</div><!-- end caFormOverlay -->
<script type='text/javascript'>
	jQuery(document).ready(function() {
		jQuery('#ResetForm').on('submit', function(e){		
			jQuery('#caMediaPanelContentArea').load(
				'<?php print caNavUrl($this->request, '', 'LoginReg', ($this->getVar("action")) ? $ps_action : 'resetSend', null); ?>',
				jQuery('#ResetForm').serialize()
			);
			e.preventDefault();
			return false;
		});
	});
</script>
<?php
	}
?>
<div style="height:120px;"></div>