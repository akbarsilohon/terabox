jQuery( document ).ready( function( $ ){

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
});