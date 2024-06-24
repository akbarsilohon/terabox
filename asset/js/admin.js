jQuery( document ).ready( function( $ ){

    /**
     * App Icon Single Post & Archive
     * 
     * @package terabox
     */
    var teraIconApp;

    $( '#tera_app-icon-change' ).on( 'click', function( e ){
        e.preventDefault();

        if( teraIconApp ){
            teraIconApp.open();
            return;
        }

        teraIconApp = wp.media.file_frames = wp.media({
            title: 'Choose Icon App',
            button: {
                text: 'Choose'
            },
            multiple: false
        });

        teraIconApp.on( 'select', function(){
            attachment = teraIconApp.state().get( 'selection' ).first().toJSON();
            $( '#tera_app-icon' ).val( attachment.url );
        });

        teraIconApp.open();
    });


    /**
     * Blog Custom Logo
     * 
     * @package terabox
     */
    var teraCustomLogo;

    $( '#changeTeraLogo' ).on( 'click', function( e ){
        e.preventDefault();

        if( teraCustomLogo ){

            teraCustomLogo.open();

            return;
        }

        teraCustomLogo = wp.media.file_frames = wp.media({
            title: 'Change Logo',
            button: {
                text: 'Chose Logo'
            },
            multiple: false
        });

        teraCustomLogo.on( 'select', function(){
            attachment = teraCustomLogo.state().get( 'selection' ).first().toJSON();
            $( '#teraLogo' ).val( attachment.url );
        });

        teraCustomLogo.open();
    });

});