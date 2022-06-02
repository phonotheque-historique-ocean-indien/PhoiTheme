<?php

function RenderDropzone($vt_object, $vb_isadmin=0) {
    global $g_request;

    $vt_user = $g_request->getUser();
    $vn_id = $vt_object->getPrimaryKey();
    $vb_isadmin = $vt_user->hasRole("admin");

    print "

    <div class=\"container\" style=\"\">
        <form action=\"".__CA_URL_ROOT__."/index.php/Phoi/Media/UploadJson/id".$vt_object->getPrimaryKey()."\" class=\"dropzone\" id=\"my-dropzone\">
            <div class=\"dz-message needsclick\">
                Déposer un fichier ou cliquer pour Parcourir les fichiers sur votre ordinateur.<br />
                <span class=\"note needsclick\"></span>
            </div>
        </form>
    </div>

<script>
var gallery= {};
Dropzone.options.myDropzone = {
    init: function() {
        thisDropzone = this;
        $.getJSON('".__CA_URL_ROOT__."/index.php/Phoi/Media/UploadJson/id/".$vt_object->getPrimaryKey()."', function(data) {
          console.log('data');
          console.log(data);
          $.each(data, function(index, val) {
            var mockFile = { name: val.label, size: val.size };
            thisDropzone.options.addedfile.call(thisDropzone, mockFile);
            thisDropzone.options.thumbnail.call(thisDropzone, mockFile, val.path + \"/\" + val.name + '#' + index);
            thisDropzone.emit(\"complete\", mockFile);
            if(val.primary == '1') {
              window.primary_media = val.label;
            }
          });
          gallery = new Viewer(document.getElementById('imageviewer'),
            {
              backdrop:true,
              navbar:3,
              toolbar: {
                zoomIn: 2,
                zoomOut: 2,
                prev: 2,
                next: 2,
                rotateLeft: 2,
                rotateRight: 2
              },
              rotatable:true,
              scalable:true,
              movable:true,
              transition:false

            }
          );
          $('.dropzone .dz-details').on('click',function(){
            $(this).parent().find('.dz-image img').click();
          });
          
          $(\"img[alt='\"+window.primary_media+\"']\").css('border', '3px solid #77adc5');
        });
    }
};

function copyShareableLink() {
  var copyText = document.getElementById(\"shareable-link\");
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */
  document.execCommand(\"copy\");
}

$(document).ready(function() {
    Viewer.setDefaults({
      focus : false,
      loading : false,
      loop : true,
      movable : true,
      navbar : true,
      rotatable : false,
      scalable : false,
      slideOnTouch:true,
      title : false,
      toolbar : false,
      tooltip : false,
      transition:false,
      zoomable:true	
    });


        $(function() {
        $.contextMenu({
            selector: '.dz-image-preview', 
            zIndex: 100,
            callback: function(key, options) {
                let filename = $(this).find('.dz-filename span').text();
                let path = $(this).find('.dz-image img').attr('src');
                let index = path.substring(path.indexOf('#')+1);
                let repr = path.split(/[\\/]/).pop();
                repr = repr.replace(/_pagewatermark\.jpg/,'');
                repr_id = repr.split(/_/).pop();

                var m = \"clicked: \" + key;
                if(key == \"quit\") {
		              return;
	              } else if(key == \"apercu\") {
                  gallery.view(index);
	              } else if(key == \"protocole\") {
                  $('#protocol-filename').html(filename.replace(/(PNIP_[0-9](\.[0-9])?)/,\"<b>$1</b>\"));
                  let protocol = filename.replace(/.*(PNIP_[0-9](\.[0-9])?).*/,\"$1\");
                  $('#protocol-link a').attr('href', '/phoi-protocoles/'+protocol+'.pdf');
                  $('#modal-protocol').addClass('is-active');
	              } else if(key == \"details\") {
                  console.log($(this).find('span[data-dz-name]').text);
                  $.get('https://".__CA_SITE_HOSTNAME__."/".__CA_URL_ROOT__."index.php/Phoi/Media/DetailInfos/id/'+repr_id+'/name/'+filename, function( data ) {
                    $( \"#details-content\" ).html( data );
                  });
                  $('#modal-details').addClass('is-active');
                } else if(key == \"signaler un abus\") {
                  $.get('https://".__CA_SITE_HOSTNAME__."/".__CA_URL_ROOT__."index.php/Contact/Form/table/ca_object_representations/id/'+repr_id, function( data ) {
                    $( \"#abus-content\" ).html( data );
                  });
                  $('#modal-abus').addClass('is-active');
                } else if(key == \"Télécharger\") {
                  window.location.href = 'https://".__CA_SITE_HOSTNAME__."/".__CA_URL_ROOT__."index.php/Phoi/Media/DownloadOriginal/representation_id/'+repr_id+'/name/'+filename;
	              } else if(key == \"principal\") {
                  window.location.href = 'https://".__CA_SITE_HOSTNAME__."/".__CA_URL_ROOT__."index.php/Phoi/Media/SetPrimary/object_id/".$vn_id."/representation_id/'+repr_id;
	              } else if(key == \"publier\") {
                  window.location.href = 'https://".__CA_SITE_HOSTNAME__."/".__CA_URL_ROOT__."index.php/Phoi/Media/SetAccessible/object_id/".$vn_id."/representation_id/'+repr_id;
	              } else if(key == \"lien\") {
                  
                  $('#shareable-link').val('https://".__CA_SITE_HOSTNAME__."/".__CA_URL_ROOT__."index.php/Detail/representations/'+repr_id);
                  $('#modal-shareable-link').addClass('is-active');
                } else {
		        	    window.console && console.log(m) || alert(m);     
	              }
            },
            items: {
                \"apercu\": {name: \"Aperçu\", icon: \"fas fa-search\"},
                \"lien\": {name: \"Obtenir le lien partageable\", icon: \"fas fa-link\"},";
if($vb_isadmin) {
  print "
                \"renommer\": {name: \"Renommer\", icon: \"fas fa-pen\"},";
}
print "
                \"details\": {name: \"Afficher les détails\", icon: \"fas fa-info\"},
                \"protocole\": {name: \"Protocole de numérisation\", icon: \"fas fa-barcode\"},";
                // \"droits\": {name: \"Gérer les droits d'auteur\", icon: \"fas fa-balance-scale-right\"},"; | INFOS 10/03 : pour l'instant non conservé dans le site
if($vb_isadmin) {
print "
                \"principal\": {name: \"Définir comme image principale\", icon: \"fas fa-medal\"},
                \"publier\": {name: \"Public\", icon: \"fas fa-eye\"},
                \"Télécharger\": {name: \"Télécharger\", icon: \"fas fa-download\"},";
}                
                
                print "
                \"signaler un abus\": {name: \"Signaler un abus\", icon: \"fas fa-angry\"},
                ".($vb_isadmin ? "\"Supprimer\": {name: \"Supprimer\", icon: \"fas fa-trash\"}," : "")."
                \"sep1\": \"---------\",
                \"quit\": {name: \"Fermer\", icon: \"fas fa-times\"}
            }
        });

        $('.context-menu-one').on('click', function(e){
            
            console.log('clicked', this);
            
        })    
    });


});
</script>
<style>
.alpaca-array-actionbar button:nth-child(3n),
.alpaca-array-actionbar button:nth-child(4n) {
    display: none;
}
.dz-remove {
    display:inline-block !important;
    width:30px;
    height:30px;
    
    position:absolute;
    top:5px;
    right:5px;
    z-index:1000;
    
    font-size:22px !important;
    line-height:22px;
    
    text-align:center;
    font-weight:bold;
    border:1px solid white !important;
    border-radius:15px;
    color:white;
    background-color:red;
    opacity:.5;
}

.dz-remove:hover {
    text-decoration:none !important;
    color:white !important;
    opacity:1;
}

@charset \"UTF-8\";
/*!
 * jQuery contextMenu - Plugin for simple contextMenu handling
 *
 * Version: v2.7.1
 *
 * Authors: Björn Brala (SWIS.nl), Rodney Rehm, Addy Osmani (patches for FF)
 * Web: http://swisnl.github.io/jQuery-contextMenu/
 *
 * Copyright (c) 2011-2018 SWIS BV and contributors
 *
 * Licensed under
 *   MIT License http://www.opensource.org/licenses/mit-license
 *
 * Date: 2018-11-29T10:56:47.812Z
 */
@-webkit-keyframes cm-spin {
  0% {
    -webkit-transform: translateY(-50%) rotate(0deg);
            transform: translateY(-50%) rotate(0deg);
  }
  100% {
    -webkit-transform: translateY(-50%) rotate(359deg);
            transform: translateY(-50%) rotate(359deg);
  }
}
@-o-keyframes cm-spin {
  0% {
    -webkit-transform: translateY(-50%) rotate(0deg);
         -o-transform: translateY(-50%) rotate(0deg);
            transform: translateY(-50%) rotate(0deg);
  }
  100% {
    -webkit-transform: translateY(-50%) rotate(359deg);
         -o-transform: translateY(-50%) rotate(359deg);
            transform: translateY(-50%) rotate(359deg);
  }
}
@keyframes cm-spin {
  0% {
    -webkit-transform: translateY(-50%) rotate(0deg);
         -o-transform: translateY(-50%) rotate(0deg);
            transform: translateY(-50%) rotate(0deg);
  }
  100% {
    -webkit-transform: translateY(-50%) rotate(359deg);
         -o-transform: translateY(-50%) rotate(359deg);
            transform: translateY(-50%) rotate(359deg);
  }
}

@font-face {
  font-family: \"context-menu-icons\";
  font-style: normal; 
  font-weight: normal;

  src: url(\"font/context-menu-icons.eot?2gb3e\");
  src: url(\"font/context-menu-icons.eot?2gb3e#iefix\") format(\"embedded-opentype\"), url(\"font/context-menu-icons.woff2?2gb3e\") format(\"woff2\"), url(\"font/context-menu-icons.woff?2gb3e\") format(\"woff\"), url(\"font/context-menu-icons.ttf?2gb3e\") format(\"truetype\");
}

.context-menu-icon-add:before {
  content: \"\EA01\";
}

.context-menu-icon-copy:before {
  content: \"\EA02\";
}

.context-menu-icon-apercu:before {
  content: \"\F21E\";
}

.context-menu-icon-cut:before {
  content: \"\EA03\";
}

.context-menu-icon-delete:before {
  content: \"\EA04\";
}

.context-menu-icon-edit:before {
  content: \"\EA05\";
}

.context-menu-icon-loading:before {
  content: \"\EA06\";
}

.context-menu-icon-paste:before {
  content: \"\EA07\";
}

.context-menu-icon-quit:before {
  content: \"\EA08\";
}

.context-menu-icon::before {
  position: absolute;
  top: 50%;
  left: 0;
  width: 2em; 
  font-family: \"context-menu-icons\";
  font-size: 1em;
  font-style: normal;
  font-weight: normal;
  line-height: 1;
  color: #2980b9;
  text-align: center;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
       -o-transform: translateY(-50%);
          transform: translateY(-50%);

  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.context-menu-icon.context-menu-hover:before {
  color: #fff;
}

.context-menu-icon.context-menu-disabled::before {
  color: #bbb;
}

.context-menu-icon.context-menu-icon-loading:before {
  -webkit-animation: cm-spin 2s infinite;
       -o-animation: cm-spin 2s infinite;
          animation: cm-spin 2s infinite;
}

.context-menu-icon.context-menu-icon--fa {
  display: list-item;
  font-family: inherit;
  line-height: inherit;
}
.context-menu-icon.context-menu-icon--fa::before {
  position: absolute;
  top: 50%;
  left: 0;
  width: 2em; 
  font-family: FontAwesome;
  font-size: 1em;
  font-style: normal;
  font-weight: normal;
  line-height: 1;
  color: #2980b9;
  text-align: center;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
       -o-transform: translateY(-50%);
          transform: translateY(-50%);

  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
.context-menu-icon.context-menu-icon--fa.context-menu-hover:before {
  color: #fff;
}
.context-menu-icon.context-menu-icon--fa.context-menu-disabled::before {
  color: #bbb;
}

.context-menu-icon.context-menu-icon--fa5 {
  display: list-item;
  font-family: inherit;
  line-height: inherit;
}
.context-menu-icon.context-menu-icon--fa5 i, .context-menu-icon.context-menu-icon--fa5 svg {
  position: absolute;
  top: .3em; 
  left: .5em;
  color: #2980b9;
}
.context-menu-icon.context-menu-icon--fa5.context-menu-hover > i, .context-menu-icon.context-menu-icon--fa5.context-menu-hover > svg {
  color: #fff;
}
.context-menu-icon.context-menu-icon--fa5.context-menu-disabled i, .context-menu-icon.context-menu-icon--fa5.context-menu-disabled svg {
  color: #bbb;
}

.context-menu-list {
  position: absolute; 
  display: inline-block;
  min-width: 13em;
  max-width: 26em;
  padding: .25em 0;
  margin: .3em;
  font-family: inherit;
  font-size: inherit;
  list-style-type: none;
  background: #fff;
  border: 1px solid #bebebe;
  border-radius: .2em;
  -webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, .5);
          box-shadow: 0 2px 5px rgba(0, 0, 0, .5);
}

.context-menu-item {
  position: relative;
  -webkit-box-sizing: content-box;
     -moz-box-sizing: content-box;
          box-sizing: content-box;
  padding: .2em 2em;
  color: #2f2f2f;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none; 
  background-color: #fff;
}

.context-menu-separator {
  padding: 0; 
  margin: .35em 0;
  border-bottom: 1px solid #e6e6e6;
}

.context-menu-item > label > input,
.context-menu-item > label > textarea {
  -webkit-user-select: text;
     -moz-user-select: text;
      -ms-user-select: text;
          user-select: text;
}

.context-menu-item.context-menu-hover {
  color: #fff;
  cursor: pointer; 
  background-color: #2980b9;
}

.context-menu-item.context-menu-disabled {
  color: #bbb;
  cursor: default; 
  background-color: #fff;
}

.context-menu-input.context-menu-hover {
  color: #2f2f2f; 
  cursor: default;
}

.context-menu-submenu:after {
  position: absolute;
  top: 50%;
  right: .5em;
  z-index: 1; 
  width: 0;
  height: 0;
  content: '';
  border-color: transparent transparent transparent #2f2f2f;
  border-style: solid;
  border-width: .25em 0 .25em .25em;
  -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
       -o-transform: translateY(-50%);
          transform: translateY(-50%);
}

/**
 * Inputs
 */
.context-menu-item.context-menu-input {
  padding: .3em .6em;
}

/* vertically align inside labels */
.context-menu-input > label > * {
  vertical-align: top;
}

/* position checkboxes and radios as icons */
.context-menu-input > label > input[type=\"checkbox\"],
.context-menu-input > label > input[type=\"radio\"] {
  position: relative;
  top: .12em; 
  margin-right: .4em;
}

.context-menu-input > label {
  margin: 0;
}

.context-menu-input > label,
.context-menu-input > label > input[type=\"text\"],
.context-menu-input > label > textarea,
.context-menu-input > label > select {
  display: block;
  width: 100%; 
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}

.context-menu-input > label > textarea {
  height: 7em;
}

.context-menu-item > .context-menu-list {
  top: .3em; 
  /* re-positioned by js */
  right: -.3em;
  display: none;
}

.context-menu-item.context-menu-visible > .context-menu-list {
  display: block;
}

.context-menu-accesskey {
  text-decoration: underline;
}
.dropzone {
  border: 2px solid rgba(0, 0, 0, 0.05);
}
.dropzone .dz-preview .dz-image {
  border-radius: 0;
}

.dz-image.fullscreen img {
  height:90% !important;
  width:auto !important;
  margin:auto !important;
}
.dz-image.fullscreen {
  z-index: 9999 !important;
  position: fixed !important;
  margin: auto;
  width: 100% !important;
  height: 100% !important;
  top: 0;
  left: 0;
  right:0;
  bottom:0;
  background-color: rgba(0,0,0,0.3);
}
.dropzone .dz-preview:hover .dz-image.fullscreen img {
    filter:none;
    -webkit-filter:none;
    -webkit-transform:none;
    transform:none;
  }

  .delete, .modal-header-close {
    -moz-appearance: none;
    -webkit-appearance: none;
    background-color: rgba(10, 10, 10, 0.2);
    border: none;
    border-radius: 290486px;
    cursor: pointer;
    pointer-events: auto;
    display: inline-block;
    flex-grow: 0;
    flex-shrink: 0;
    font-size: 0;
    height: 20px;
    max-height: 20px;
    max-width: 20px;
    min-height: 20px;
    min-width: 20px;
    outline: none;
    position: relative;
    vertical-align: top;
    width: 20px; }
    .delete::before, .modal-header-close::before, .delete::after, .modal-header-close::after {
      background-color: white;
      content: \"\";
      display: block;
      left: 50%;
      position: absolute;
      top: 50%;
      transform: translateX(-50%) translateY(-50%) rotate(45deg);
      transform-origin: center center; }
    .delete::before, .modal-header-close::before {
      height: 2px;
      width: 50%; }
    .delete::after, .modal-header-close::after {
      height: 50%;
      width: 2px; }
    .delete:hover, .modal-header-close:hover, .delete:focus, .modal-header-close:focus {
      background-color: rgba(10, 10, 10, 0.3); }
    .delete:active, .modal-header-close:active {
      background-color: rgba(10, 10, 10, 0.4); }
    .is-small.delete, .is-small.modal-header-close {
      height: 16px;
      max-height: 16px;
      max-width: 16px;
      min-height: 16px;
      min-width: 16px;
      width: 16px; }
    .is-medium.delete, .is-medium.modal-header-close {
      height: 24px;
      max-height: 24px;
      max-width: 24px;
      min-height: 24px;
      min-width: 24px;
      width: 24px; }
    .is-large.delete, .is-large.modal-header-close {
      height: 32px;
      max-height: 32px;
      max-width: 32px;
      min-height: 32px;
      min-width: 32px;
      width: 32px; }
</style>";
}
