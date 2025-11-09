//<![CDATA[
jQuery(function($){
    // Preview video thumbnail in meta box
    $('#video-destaque .button.add').on('click', function(e) {
        var $input = $('#video-destaque #id_video');
        var id = $input.val().trim();
        if ( ! id ) {
            e.preventDefault();
            $input.css({ border: '1px solid #aaa' }).focus();
        } else {
            // Remove existing thumbnail and insert new one above the list
            $('#video_destaque_metabox .thumb').remove();
            var thumbHtml = '<img class="thumb" src="https://img.youtube.com/vi/' + encodeURIComponent( id ) + '/0.jpg" alt="" style="display:block;" />';
            $('#video-destaque').before( thumbHtml );
            // allow default submission to save meta
        }
    });
    // Remove video thumbnail and clear input
    $('#video-destaque .button.del').on('click', function(e) {
        var $input = $('#video-destaque #id_video');
        var id = $input.val().trim();
        if ( ! id ) {
            e.preventDefault();
            $input.css({ border: '1px solid #aaa' }).focus();
        } else {
            // Clear input, remove thumbnail, and submit form to save
            $input.val('');
            $('#video_destaque_metabox .thumb').remove();
            // allow default submission to save meta
        }
    });
    $('.vd-options a').click(function(event){
        event.preventDefault();
        $('.vd-more').toggle();
    });

    // Admin settings select all
    $(document).ready(function() {
        $("#cb-select-all").click(function() {
            var checkBoxes = $("input[name*=video_destacado]");
            checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        });
    });
});
//]]>
