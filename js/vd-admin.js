//<![CDATA[
jQuery(function($){
    $('#video-destaque .button.add, #video-destaque .button[name=add]').bind('click', function(e){
    	var id = $('#video-destaque #id_video').attr("value");
    	if( id == "" ){
            e.preventDefault();
    		$('#video-destaque #id_video').css({'border': '1px solid #aaa'}).focus();
    	}else{
    		$('#video_destaque_metabox .thumb').hide();
    		$(this).parent().parent().before('<img class="thumb" src="http://img.youtube.com/vi/'+id+'/0.jpg" alt="titulo" />');
    	}
    });
    $('#video-destaque .button.del, #video-destaque .button[name=del]').bind('click', function(e){

        var id = $('#video-destaque #id_video').attr("value");
        if( id == "" ){
            e.preventDefault();
            $('#video-destaque #id_video').css({'border': '1px solid #aaa'}).focus();
        }else{
            $('#video-destaque #id_video').val('');
            $('#video_destaque_metabox .thumb').remove();
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
