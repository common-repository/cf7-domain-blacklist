jQuery.extend(jQuery.validator.messages, {
    required: "This field is required.",
    remote: "Please fix this field.",
    email: "Please enter a valid email address.",
    url: "Please enter a valid URL.",
    date: "Please enter a valid date.",
    dateISO: "Please enter a valid date (ISO).",
    number: "Please enter a valid number.",
    digits: "Please enter only digits.",
    creditcard: "Please enter a valid credit card number.",
    equalTo: "Please enter the same value again.",
    accept: "Please enter a value with a valid extension.",
    maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
    minlength: jQuery.validator.format("Please enter at least {0} characters."),
    rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
    range: jQuery.validator.format("Please enter a value between {0} and {1}."),
    max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
    min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
});

 // Validação e envio do formulário via ajax
jQuery(document).ready(function(){
    jQuery('[data-toggle="tooltip"]').tooltip();

    jQuery(".validate").validate();
    jQuery(".validate").submit(function() {
        if (jQuery(".validate").valid()) {
            jQuery(this).find("button[type=submit]").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> processando...');
        }
    });

    jQuery(".loading").submit(function(e) {
        jQuery('button[type="submit"]').attr("disabled", "disabled");
        jQuery('button[type="submit"]').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> processando...');
    });
});

function copyToClipboard(element) {
    jQuery(".copy-result").html("");
    var $temp = jQuery("<textarea>");
    jQuery("body").append($temp);
    $temp.html(jQuery(element).text()).select();
    if (document.execCommand("copy")) {
        jQuery(element + "_copy").html("copiado");
        setTimeout(function(){
           jQuery(".copy-result").html("");
        }, 2000);
    }
    $temp.remove();
}

// Upload de arquivos
function uploadFile(obj)
{
    var file_frame;
    var img_name = jQuery(obj).closest('div').find('.upload_image');

    if (file_frame) {
        file_frame.open();
        return;
    }

    file_frame = wp.media.frames.file_frame = wp.media(
        {
            title: 'Selecione um arquivo',
            button: {
                text: jQuery(this).data('uploader_button_text')
            },
            multiple: false
        }
    );

    file_frame.on('select', function() {
        attachment = file_frame.state().get('selection').first().toJSON();
        var newwurl = attachment.url.split(contentUrl);
        img_name[0].value = contentUrl + newwurl[1];
        file_frame.close();
       // jQuery('.upload_image').val(attachment.url);
    });

    file_frame.open();
}
// Remove arquivo do campo (input)
function removeFile(obj) {
    var img_name;
    if (jQuery(obj).closest('div').find('.upload_image').length > 0) {
        img_name = jQuery(obj).closest('div').find('.upload_image');
    } else {
        img_name = jQuery(obj).closest('td').find('.upload_image');
    }
    if (typeof img_name != "undefined") {
        img_name.val('');
    }
}

// Encoda o conteúdo em base64
var Base64={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(e){var t="";var n,r,i,s,o,u,a;var f=0;e=Base64._utf8_encode(e);while(f<e.length){n=e.charCodeAt(f++);r=e.charCodeAt(f++);i=e.charCodeAt(f++);s=n>>2;o=(n&3)<<4|r>>4;u=(r&15)<<2|i>>6;a=i&63;if(isNaN(r)){u=a=64}else if(isNaN(i)){a=64}t=t+this._keyStr.charAt(s)+this._keyStr.charAt(o)+this._keyStr.charAt(u)+this._keyStr.charAt(a)}return t},decode:function(e){var t="";var n,r,i;var s,o,u,a;var f=0;e=e.replace(/[^A-Za-z0-9+/=]/g,"");while(f<e.length){s=this._keyStr.indexOf(e.charAt(f++));o=this._keyStr.indexOf(e.charAt(f++));u=this._keyStr.indexOf(e.charAt(f++));a=this._keyStr.indexOf(e.charAt(f++));n=s<<2|o>>4;r=(o&15)<<4|u>>2;i=(u&3)<<6|a;t=t+String.fromCharCode(n);if(u!=64){t=t+String.fromCharCode(r)}if(a!=64){t=t+String.fromCharCode(i)}}t=Base64._utf8_decode(t);return t},_utf8_encode:function(e){e=e.replace(/rn/g,"n");var t="";for(var n=0;n<e.length;n++){var r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r)}else if(r>127&&r<2048){t+=String.fromCharCode(r>>6|192);t+=String.fromCharCode(r&63|128)}else{t+=String.fromCharCode(r>>12|224);t+=String.fromCharCode(r>>6&63|128);t+=String.fromCharCode(r&63|128)}}return t},_utf8_decode:function(e){var t="";var n=0;var r=c1=c2=0;while(n<e.length){r=e.charCodeAt(n);if(r<128){t+=String.fromCharCode(r);n++}else if(r>191&&r<224){c2=e.charCodeAt(n+1);t+=String.fromCharCode((r&31)<<6|c2&63);n+=2}else{c2=e.charCodeAt(n+1);c3=e.charCodeAt(n+2);t+=String.fromCharCode((r&15)<<12|(c2&63)<<6|c3&63);n+=3}}return t}}
