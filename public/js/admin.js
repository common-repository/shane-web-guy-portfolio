jQuery(document).ready( function( $ ) {
    $('#upload_image_button').click(function() {

        formfield = $('#upload_image').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    window.send_to_editor = function(html) {
        imgurl = $('img',html).attr('src');
        $('#upload_image').val(imgurl);
        $('#upload_image').attr('value', imgurl);
        tb_remove();
    }

     var swgpreview = $("#swgpreview");

    $('#tabs').tabs();

    $('.pick').colorpicker().on('changeColor.colorpicker', function(event){
      var targetPicker = $($(this).attr('data-target'));
      var selectorPicker = $(this).attr('data-css-selector');
        console.log($(this).attr('data-target') + '---' + selectorPicker +'--' + event.color.toHex());
        targetPicker.css(selectorPicker,  event.color.toHex());
    });

    $('#tabs-1').on('change','#upload_image',function(){
        var targetChange = $($(this).attr('data-target'));
        var selectorChange = $(this).attr('data-css-selector');
        console.log($(this).attr('data-target') + '---' + selectorChange +'--' + $(this).val());
        targetChange.css(selectorChange, $(this).val());       
    });

    $('#tabs-1').on('keyup', 'input', function() {
        var targetChange = $($(this).attr('data-target'));
        var text = $($(this)).attr('data-text');
        var selectorChange = $(this).attr('data-css-selector');
        if(text === "true"){
            targetChange.text($(this).val());    
        }else{
          console.log($(this).attr('data-target') + '---' + selectorChange +'--' + $(this).val());
          targetChange.css(selectorChange, $(this).val());      
        }
        
    });

    $('#tabs-1').on('change', 'select', function() {
        var targetChange = $($(this).attr('data-target'));
        var selectorChange = $(this).attr('data-css-selector');
        console.log($(this).attr('data-target') + '---' + selectorChange +'--' + $(this).val());
        targetChange.css(selectorChange, $(this).val());           
    });

});