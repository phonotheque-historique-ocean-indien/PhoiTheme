<?php
/* ----------------------------------------------------------------------
 * default/views/mailTemplates/reg_conf_html.tpl
 * ----------------------------------------------------------------------
 * CollectiveAccess
 * Open-source collections management software
 * ----------------------------------------------------------------------
 *
 * Software by Whirl-i-Gig (http://www.whirl-i-gig.com)
 * Copyright 2009-2010 Whirl-i-Gig
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

print _t("Merci de vous être enregistré sur la PHOI")."<br/>".$vs_active_message."<br/><br/>";

print _t("Veuillez cliquer sur ce lien pour activer votre compte :<br/>");
print "<a href='https://www.phoi.io/index.php/Phoi/Users/ValidateEmail/token/!!TOKEN!!/user_id/!!USER_ID!!' style='color:blue;text-decoration:underline'>Activer mon compte</a><br/>";
print "<br/><br/>";
print "Merci,<br/>
L'équipe de la PHOI";
print "<br/><br/>";
print "<a href='https://www.phoi.io'>www.phoi.io</a>";
