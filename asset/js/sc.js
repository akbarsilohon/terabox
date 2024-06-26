/**
 * Shortcode JS for terabox Wordpress Theme
 * 
 * @package terabox
 */

( function(){
    tinymce.PluginManager.add( 'tera_mce', function( editor ){
        editor.addButton( 'tera_mce', {
            text: 'SCODE',
            type: 'menubutton',
            menu: [
                {
                    text: 'ADS',
                    onclick: function(){
                        editor.insertContent('<p>[tera-ad]</p>');
                    }
                },
                {
                    text: 'Button Download',
                    onclick: function(){
                        editor.windowManager.open({
                            title: 'Add Button',
                            body: [
                                {
                                    type: 'textbox',
                                    name: 'btnText',
                                    label: 'Button Text',
                                    minWidth: 380,
                                    value: 'Download'
                                }, {
                                    type: 'textbox',
                                    name: 'btnURI',
                                    label: 'Button Url',
                                    value: ''
                                }
                            ],
                            onsubmit: function( e ){
                                var btnText = e.data.btnText;
                                var btnURI = e.data.btnURI;

                                editor.insertContent('<p>[tera-btn text="'+ btnText +'" url="'+ btnURI +'"]</p>');
                            }
                        });
                    }
                }
            ]
        });
    });
})();