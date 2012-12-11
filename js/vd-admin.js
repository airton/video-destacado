//<![CDATA[
jQuery(function($){ 
    $('#video-destaque .button.add').bind('click', function(){
    	var id = $('#video-destaque #id_video').attr("value");
    	if( id == "" ){
    		$('#video-destaque #id_video').css({'border': '1px solid #aaa'});
    	}else{
    		$('#video_destaque_metabox .thumb').hide();
    		$(this).parent().parent().before('<img class="thumb" src="http://img.youtube.com/vi/'+id+'/0.jpg" alt="titulo" />');
    	}
    });
    $('#video-destaque .button.del').bind('click', function(){
    	$('#video-destaque #id_video').val('');
    	$('#video_destaque_metabox .thumb').remove();
    });
    $('.vd-options a').click(function(event){
        event.preventDefault();
        $('.vd-more').toggle();
    });
});
//]]>