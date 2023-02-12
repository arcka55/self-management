/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	
	// Define changes to default configuration here. For example:
	config.language = 'en';
	// config.uiColor = '#AADC6E';
	// config.width = '660px';
	// config.height = '450px';
	config.embed_provider = '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}';

	config.filebrowserBrowseUrl = baseUrl + 'assets/plugin-berita/kcfinder/browse.php?opener=CKEditor&type=files&responseType=json';
	config.filebrowserImageBrowseUrl = baseUrl + 'assets/plugin-berita/kcfinder/browse.php?opener=CKEditor&type=images&responseType=json';
	config.filebrowserFlashBrowseUrl = baseUrl + 'assets/plugin-berita/kcfinder/browse.php?opener=CKEditor&type=flash&responseType=json';
	config.filebrowserUploadUrl = baseUrl + 'assets/plugin-berita/kcfinder/upload.php?opener=CKEditor&type=files&responseType=json';
	config.filebrowserImageUploadUrl = baseUrl + 'assets/plugin-berita/kcfinder/upload.php?opener=CKEditor&type=images&responseType=json';
	config.filebrowserFlashUploadUrl = baseUrl + 'assets/plugin-berita/kcfinder/upload.php?opener=CKEditor&type=flash&responseType=json';
 
 
	config.imageUploadUrl = baseUrl + 'assets/plugin-berita/kcfinder/upload.php?opener=CKEditor&type=images';
	config.extraPlugins = 'undo';
	config.extraPlugins = 'lineutils';
	config.extraPlugins = 'clipboard';
	config.extraPlugins = 'popup';
	config.extraPlugins = 'dialog';
	config.extraPlugins = 'dialogui';
	config.extraPlugins = 'filetools';
	config.extraPlugins = 'filebrowser';
	config.extraPlugins = 'notification';
	config.extraPlugins = 'notificationaggregator';
	config.extraPlugins = 'toolbar';
	config.extraPlugins = 'button';
	config.extraPlugins = 'widget';
	config.extraPlugins = 'widgetselection';
	config.extraPlugins = 'uploadwidget';
	config.extraPlugins = 'uploadimage';


	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools', 'media' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// config.toolbar = 'MyToolbar';

	// config.toolbar_MyToolbar =
	// [
	// 	{ name: 'screen', items : [ 'Source' ] },
	// 	{ name: 'screen', items : [ 'Maximize' ] },
	// 	{ name: 'undoredo', items : [ 'Undo','Redo' ] },
	// 	{ name: 'clipboard', items : [ 'Cut','Copy','PasteText','SelectAll' ] },
	// 	{ name: 'findreplace', items : [ 'Find' ] },
	// 	{ name: 'findreplace', items : [ 'Scayt' ] },

	// 	'/',

	// 	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline' ] },
	// 	{ name: 'basicstyles', items : [ 'Strike','Subscript','Superscript' ] },
	// 	{ name: 'paragraph', items : [ 'NumberedList','BulletedList' ] },
	// 	{ name: 'paragraph', items : [ 'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
	// 	{ name: 'styles', items : [ 'Format' ] },
	// 	{ name: 'styles', items : [ 'RemoveFormat' ] },

	//     '/',

	//     { name: 'styles', items : [ 'Font','FontSize' ] },
	//     { name: 'colors', items : [ 'TextColor','BGColor' ] },

	// 	'/',

    //     { name: 'findreplace', items : [ 'Templates' ] },
	// 	{ name: 'insert', items : [ 'Image' ] },
	// 	{ name: 'insert', items : [ 'Table' ] },
	// 	{ name: 'insert', items : [ 'Link','Unlink','Anchor' ] },
	// 	{ name: 'insert', items : [ 'HorizontalRule','SpecialChar','Smiley' ] },

	// ];

    config.templates_files = [ baseUrl + 'assets/plugin-berita/modules/ckeditor/templates/templates.php' ];
    config.templates='zondermarge,metmarge';
    config.templates_replaceContent = false;

config.forcePasteAsPlainText = true;

config.allowedContent = 'img[!src,alt,width,height,align,border,title,data-cke-upload-id,data-widget,data-cke-widget-keep-attr,style]{border-width,border-style,display}(cke_widget_element); p b i u h1 h2 h3 h4 hr sub sup s ul ol li[*]{*}; a[*]{*}; iframe[*]{*}; span{font-family,font-size,color,background-color,line-height}; table[width,height,align,border,cellpadding,cellspacing,summary,frame,rules]{background-color}; tr[height,valign]{height,vertical-align,background-color}; th td[width,height,align,valign,colspan]{width,height,text-align,vertical-align,background-color}; caption[align]{width,height,text-align,vertical-align}';

CKEDITOR.on('dialogDefinition', function( ev ) {
  var dialogName = ev.data.name;
  var dialogDefinition = ev.data.definition;

  if(dialogName === 'table') {
    var infoTab = dialogDefinition.getContents('info');
    var cellSpacing = infoTab.get('txtCellSpace');
    cellSpacing['default'] = "0";
    var cellPadding = infoTab.get('txtCellPad');
    cellPadding['default'] = "0";
    var border = infoTab.get('txtBorder');
    border['default'] = "0";
  }
});

CKEDITOR.on('dialogDefinition', function( ev ) {
  var dialogName = ev.data.name;
  var dialogDefinition = ev.data.definition;

  if(dialogName === 'image') {
    var infoTab = dialogDefinition.getContents('info');
    var border = infoTab.get('txtBorder');
    border['default'] = "0";
  }
});



};