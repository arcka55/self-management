// Register a template definition set named "default".
CKEDITOR.addTemplates( 'default',
{
   // The name of the subfolder that contains the preview images of the templates.
   imagesPath : CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),

   // Template definitions.
   templates :
      [
         {
            title: 'in tweeen gedeeld', // div in two coloms
            image: 'template4.gif',
            description: 'Wil je een pagina in twee nette kolommen, selecteer dan deze.',
            html:
               '' +
               '<div class="content"><div class="eentweede links"><h3>Hoofdstuk 1</h3><p>je tekst hier</p></div><div class="eentweede rechts"><h3>Hoofdstuk 2</h3><p>je tekst hier</p></div></div>'
         },
         {
            title: 'in drieen gedeeld', // div in three coloms
            image: 'template6.gif',
            description: 'Wil je een pagina in twee nette kolommen, selecteer dan deze.',
            html:
               '' +
               '<div class="content"><div class="eentweede links"><h3>Hoofdstuk 1</h3><p>je tekst hier</p></div><div class="eentweede rechts"><h3>Hoofdstuk 2</h3><p>je tekst hier</p></div></div>'
         },
         {
            title: 'in vieren gedeeld', // div in four coloms
            image: 'template5.gif',
            description: 'Gebruik dit voor bijvoorbeeld de voorpagina.',
            html:
               '' +
               '<div class="content"><div class="eenvierde links"><h6>sectie 1</h6><p>je tekst hier</p></div><div class="eenvierde links"><h6>sectie 2</h6><p>je tekst hier</p></div><div class="eenvierde links"><h6>sectie 3</h6><p>je tekst hier</p></div><div class="eenvierde rechts"><h6>sectie 4</h6><p>je tekst hier</p></div></div>'
         },
         {
            title: 'in tweeen gedeeld',
            image: 'template4.gif',
            description: 'Wil je een pagina in twee nette kolommen, selecteer dan deze.',
            html:
               '' +
               '<div class="content"><div class="eentweede links"><h3>Hoofdstuk 1</h3><p>je tekst hier</p></div><div class="eentweede rechts"><h3>Hoofdstuk 2</h3><p>je tekst hier</p></div></div>'
         }
      ]
});