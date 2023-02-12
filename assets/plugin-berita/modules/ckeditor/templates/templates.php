<?php

header("Content-Type: application/javascript");

{
$templates = <<<JSCODE1
// Register a template definition set named "default".
CKEDITOR.addTemplates( 'zondermarge',
{
   // The name of the subfolder that contains the preview images of the templates.
   imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + '../../templates/images/' ),

   // Template definitions.
   templates :
      [
         {
            title: '1 kolom zonder marge links/rechts',
            image: '1-kolom.png',
            description: '600px breed',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="600"><p>600px</p></td></tr></table><br>'
         },
         {
            title: '2 kolommen zonder marge links/rechts',
            image: '2-kolommen-geenmarge.png',
            description: 'elk 300px breed - geen marge tussenin',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="300"><p>300px</p></td><td width="300"><p>300px</p></td></tr></table><br>'
         },
         {
            title: '2 kolommen zonder marge links/rechts',
            image: '2-kolommen.png',
            description: 'elk 285px breed - 30px marge tussenin',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="285"><p>285px</p></td><td width="30"></td><td width="285"><p>285px</p></td></tr></table><br>'
         },
         {
            title: '3 kolommen zonder marge links/rechts',
            image: '3-kolommen.png',
            description: 'elk 180px breed - 30px marge tussenin',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="180"><p>180px</p></td><td width="30"></td><td width="180"><p>180px</p></td><td width="30"></td><td width="180"><p>180px</p></td></tr></table><br>'
         },
         {
            title: '4 kolommen zonder marge links/rechts',
            image: '4-kolommen.png',
            description: 'elk 129px breed - 28px marge tussenin',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="129"><p>129px</p></td><td width="28"></td><td width="129"><p>129px</p></td><td width="28"></td><td width="129"><p>129px</p></td><td width="28"></td><td width="129"><p>129px</p></td></tr></table><br>'
         }
      ]
});
CKEDITOR.addTemplates( 'metmarge',
{
   // The name of the subfolder that contains the preview images of the templates.
   imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + '../../templates/images/' ),

   // Template definitions.
   templates :
      [
         {
            title: '1 kolom met marge links/rechts', // table in four coloms
            image: '1-kolom-marge.png',
            description: '520px breed',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="40"></td><td width="520"><p>520px breed</p></td><td width="40"></td></tr></table><br>'
         },
         {
            title: '2 kolommen met marge links/rechts', // table in two coloms
            image: '2-kolommen-marge.png',
            description: 'elk 245px breed - 30px marge tussenin',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="40"></td><td width="245"><p>245px</p></td><td width="30"></td><td width="245"><p>245px</p></td><td width="40"></td></tr></table><br>'
         },
         {
            title: '3 kolommen met marge links/rechts', // table in three coloms
            image: '3-kolommen-marge.png',
            description: 'elk 154px breed - 29px marge tussenin',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="40"></td><td width="154"><p>154px</p></td><td width="29"></td><td width="154"><p>154px</p></td><td width="29"></td><td width="154"><p>154px</p></td><td width="40"></td></tr></table><br>'
         },
         {
            title: '4 kolommen met marge links/rechts', // table in four coloms
            image: '4-kolommen-marge.png',
            description: 'elk 109px breed - 28px marge tussenin',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="40"></td><td width="109"><p>109px</p></td><td width="28"></td><td width="109"><p>109px</p></td><td width="28"></td><td width="109"><p>109px</p></td><td width="28"></td><td width="109"><p>109px</p></td><td width="40"></td></tr></table><br>'
         },
         {
            title: '2 kolommen met marge links/rechts', // table in two coloms
            image: '2-kolommen-marge-kg.png',
            description: '130px en 360px breed - 30px marge tussenin',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="40"></td><td width="130"><p>130px</p></td><td width="30"></td><td width="360"><p>360px</p></td><td width="40"></td></tr></table><br>'
         },
         {
            title: '2 kolommen met marge links/rechts', // table in two coloms
            image: '2-kolommen-marge-gk.png',
            description: '360px en 130px breed - 30px marge tussenin',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="40"></td><td width="360"><p>360px</p></td><td width="30"></td><td width="130"><p>130px</p></td><td width="40"></td></tr></table><br>'
         }
      ]
});
JSCODE1;
}



{
$templates2 = <<<JSCODE2
// Register a template definition set named "default".
CKEDITOR.addTemplates( 'default',
{
   // The name of the subfolder that contains the preview images of the templates.
   imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + '../../templates/images/' ),

   // Template definitions.
   templates :
      [
         {
            title: '1 kolom met marge', // table in four coloms
            image: '4-kolommen.png',
            description: '520px breed - 40px marge links/rechts',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="40"></td><td width="520"><p>520px breed</p></td><td width="40"></td></tr></table><br>'
         }
      ]
});
JSCODE2;
}


echo $templates;


?>