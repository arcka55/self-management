// Register a template definition set named "default".
CKEDITOR.addTemplates( 'default',
{
   // The name of the subfolder that contains the preview images of the templates.
   imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + '../../templates/images/' ),

   // Template definitions.
   templates :
      [
         {
            title: '2 kolommen', // table in two coloms
            image: '2-kolommen.png',
            description: 'elk 285px breed - 30px marge',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="285"><p>285px</p></td><td width="30"></td><td width="285"><p>285px</p></td></tr></table><br>'
         },
         {
            title: '3 kolommen', // table in three coloms
            image: '3-kolommen.png',
            description: 'elk 180px breed - 30px marge',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="180"><p>180px</p></td><td width="30"></td><td width="180"><p>180px</p></td><td width="30"></td><td width="180"><p>180px</p></td></tr></table><br>'
         },
         {
            title: '4 kolommen', // table in four coloms
            image: '4-kolommen.png',
            description: 'elk 129px breed - 28px marge',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="129"><p>129px</p></td><td width="28"></td><td width="129"><p>129px</p></td><td width="28"></td><td width="129"><p>129px</p></td><td width="28"></td><td width="129"><p>129px</p></td></tr></table><br>'
         },
         {
            title: '1 kolom met marge', // table in four coloms
            image: '4-kolommen.png',
            description: '520px breed - 40px marge links/rechts',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="40"></td><td width="520"><p>520px</p></td><td width="40"></td></tr></table><br>'
         }
      ]
});

CKEDITOR.addTemplates( 'test',
{
   // The name of the subfolder that contains the preview images of the templates.
   imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + '../../templates/images/' ),

   // Template definitions.
   templates :
      [
         {
            title: '2 kolommen', // table in two coloms
            image: '2-kolommen.png',
            description: 'elk 285px breed - 30px marge',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="285"><p>285px</p></td><td width="30"></td><td width="285"><p>285px</p></td></tr></table><br>'
         },
         {
            title: '3 kolommen', // table in three coloms
            image: '3-kolommen.png',
            description: 'elk 180px breed - 30px marge',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="180"><p>180px</p></td><td width="30"></td><td width="180"><p>180px</p></td><td width="30"></td><td width="180"><p>180px</p></td></tr></table><br>'
         },
         {
            title: '4 kolommen', // table in four coloms
            image: '4-kolommen.png',
            description: 'elk 129px breed - 28px marge',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="129"><p>129px</p></td><td width="28"></td><td width="129"><p>129px</p></td><td width="28"></td><td width="129"><p>129px</p></td><td width="28"></td><td width="129"><p>129px</p></td></tr></table><br>'
         },
         {
            title: '1 kolom met marge', // table in four coloms
            image: '4-kolommen.png',
            description: '520px breed - 40px marge links/rechts',
            html:
               '' +
               '<table width="600" cellspacing="0" cellpadding="0" border="0"><tr valign="top"><td width="40"></td><td width="520"><p>520px</p></td><td width="40"></td></tr></table><br>'
         }
      ]
});