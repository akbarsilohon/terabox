/**
 * Shortcode JS for terabox Wordpress Theme
 * 
 * @package terabox
 */

( function(){
    tinymce.PluginManager.add( 'tera_mce', function( editor ){
        editor.addButton( 'tera_mce', {
            text: 'ADS',
            onclick: function(){
                editor.insertContent( '<p>[tera-ad]</p>' );
            }
        });
    });
})();