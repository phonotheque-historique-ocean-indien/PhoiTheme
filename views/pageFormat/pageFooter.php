<?php
/* ----------------------------------------------------------------------
 * views/pageFormat/pageFooter.php : 
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2015-2018 Whirl-i-Gig
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
?>

		</div><!-- end of main container -->
		<div style="clear:both; height:1px;"><!-- empty --></div>
<footer class="footer phoi-gray-footer">
	<!-- First row of the footer -->
	<div class="container">
		<div class="columns">
			<div class="column is-two-thirds">
				<img src="/logo-footer.png">
			</div>
			<div class="column">
				<img src="<?php print __CA_URL_ROOT__; ?>/themes/phoi/assets/pawtucket/graphics/logo_prma.png" style="height:80px;" /><br/>
                Pôle Régional de Musiques Actuelles de la Réunion<br/>
				53 chaussée royale BP 18 <br/>
                97 861 Saint-Paul CEDEX<br/>
				<br/>
				T. 0262 90 94 60<br/>
				<br/>
				Mentions légales et crédits<br/>
				Protections des données personnelles<br/>
				CGU<br/>
				Plan du site<br/>
				<div class="phoi-social-bar">
					<img src="/phoi-socialbar.png"
				</div>
			</div>
		</div>
	</div>
	<!-- Second row of the footer -->
	<div class="container">
		© 2020 – Tous droits réservés
	</div>

</footer>
<footer class="footer phoi-logobar">
	<div class="container">
		<div class="columns is-vcentered">
			<div class="column">
				<a href="https://www.regionreunion.com/sites/interreg/">
					<img src="https://image.jimcdn.com/app/cms/image/transf/none/path/s69c567e4f0ca7728/image/i1eaea9e42e9557d7/version/1540368098/image.jpg">
				</a>
			</div>
			<div class="column">
				<a href="https://www.culture.gouv.fr/Regions/Dac-de-La-Reunion">
					<img src="https://echodesmots.info/IMG/siteon419.png?1444478225">
				</a>
			</div>
			<div class="column">
				<a href="https://www.regionreunion.com/">
					<img src="https://pbs.twimg.com/profile_images/610387366835056641/OzpmvoAK_400x400.png">
				</a>
			</div>
			<div class="column">
				<a href="https://www.cg974.fr/">
					<img src="https://upload.wikimedia.org/wikipedia/fr/thumb/0/03/Logo_Conseil_G%C3%A9n%C3%A9ral_R%C3%A9union.svg/1200px-Logo_Conseil_G%C3%A9n%C3%A9ral_R%C3%A9union.svg.png">
				</a>
			</div>
			<div class="column">
				<a href="https://www.sacem.fr/">
				<img src="https://upload.wikimedia.org/wikipedia/fr/thumb/b/b5/SACEM_HD.jpg/1200px-SACEM_HD.jpg">
				</a>
			</div>
			<div class="column">
				<a href="https://craam.mg/">
					<img src="/logo_craam.png">
				</a>
			</div>
			<div class="column">
				<img src="/logo_rodrigues_service_culture.png">
			</div>
			<div class="column">
				<a href="http://conservatoire.govmu.org/English/Pages/default.aspx">
					<img src="/logo_cdm.png">
				</a>
			</div>
			<div class="column">
				<a href="https://cg976.fr/votre-departement/linstitution/les-services-administratifs/pssp/dadds">
					<img src="https://cdn.mesplaques.fr/wp-content/uploads/2019/06/mayotte-1.png">
				</a>
			</div>
			<div class="column">
				<img src="logo-seychelles.png">
			</div>
			<div class="column">
				<img src="https://www.lalanbik.org/rfm/source/ANNUAIRES/Comores/collec%20Publique/cndrs.jpg"/>
			</div>
		</div>
	</div>
</footer>
<?php
	//
	// Output HTML for debug bar
	//
	if(Debug::isEnabled()) {
		print Debug::$bar->getJavascriptRenderer()->render();
	}
?>
	
		<?php print TooltipManager::getLoadHTML(); ?>
		<div id="caMediaPanel"> 
			<div id="caMediaPanelContentArea">
			
			</div>
		</div>
		<script type="text/javascript">
			/*
				Set up the "caMediaPanel" panel that will be triggered by links in object detail
				Note that the actual <div>'s implementing the panel are located here in views/pageFormat/pageFooter.php
			*/
			var caMediaPanel;
			jQuery(document).ready(function() {
				if (caUI.initPanel) {
					caMediaPanel = caUI.initPanel({ 
						panelID: 'caMediaPanel',										/* DOM ID of the <div> enclosing the panel */
						panelContentID: 'caMediaPanelContentArea',		/* DOM ID of the content area <div> in the panel */
						exposeBackgroundColor: '#FFFFFF',						/* color (in hex notation) of background masking out page content; include the leading '#' in the color spec */
						exposeBackgroundOpacity: 0.7,							/* opacity of background color masking out page content; 1.0 is opaque */
						panelTransitionSpeed: 400, 									/* time it takes the panel to fade in/out in milliseconds */
						allowMobileSafariZooming: true,
						mobileSafariViewportTagID: '_msafari_viewport',
						closeButtonSelector: '.close'					/* anything with the CSS classname "close" will trigger the panel to close */
					});
				}

				$("button.delete").on("click", function() {
					$(this).parent().remove();
				});
				
				$(".card").mouseenter(function() {
					$(this).find(".card-header-icon").show();
				})

				$(".card").mouseleave(function() {
					$(this).find(".card-header-icon").hide();
				})

				$(".card-content-item").mouseenter(function() {
					$(this).find(".card-content-icon").show();
				})

				$(".card-content-item").mouseleave(function() {
					$(this).find(".card-content-icon").hide();
				})

			});
			/*(function(e,d,b){var a=0;var f=null;var c={x:0,y:0};e("[data-toggle]").closest("li").on("mouseenter",function(g){if(f){f.removeClass("open")}d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mousemove",function(g){if(Math.abs(c.x-g.ScreenX)>4||Math.abs(c.y-g.ScreenY)>4){c.x=g.ScreenX;c.y=g.ScreenY;return}if(f.hasClass("open")){return}d.clearTimeout(a);a=d.setTimeout(function(){f.addClass("open")},b)}).on("mouseleave",function(g){d.clearTimeout(a);f=e(this);a=d.setTimeout(function(){f.removeClass("open")},b)})})(jQuery,window,200);*/
		</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-165049450-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-165049450-1');
</script>

	</body>
</html>
