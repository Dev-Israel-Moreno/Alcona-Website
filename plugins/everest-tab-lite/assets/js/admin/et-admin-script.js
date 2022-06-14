/* 
 * Admin JS Script
 */
 (function ($) {
    $(document).ready(function () {

        /* 
         * Custom Metabox General Tab Settings
         */
         $('ul.et-nav-tabs li').click(function () {
            var tab_id = $(this).attr('data-id');
            $('ul.et-nav-tabs li').removeClass('et-active');
            $('.et-tab-content').hide().removeClass('et-tab-content-active');
            $(this).addClass('et-active');
            $("#" + tab_id).fadeIn('300').addClass('et-tab-content-active');
            
        });


         $('.et-color-picker').wpColorPicker();

        /*
         * Display Tab Templates
         */
         $('#et_template_type').on('change', function () {
            var tid = $(this).val();
            $('.et_listtemplate').hide();
            $('#' + tid).show();
            if(tid == 'template2'){
             $('#etab-template2-option').show();
         }else{
            $('#etab-template2-option').hide();
        }
        if(tid == 'template3'){
         $('#etab-template3-option').show();
     }else{
        $('#etab-template3-option').hide();
    }
});

         var tempid = $('#et_template_type option:selected').val();
         if(tempid == 'template2'){
             $('#etab-template2-option').show();
         }else{
            $('#etab-template2-option').hide();
        }
        if(tempid == 'template3'){
         $('#etab-template3-option').show();
     }else{
        $('#etab-template3-option').hide();
    }


    var ajaxurl = et_admin_params.ajax_url,
    ajaxnonce = et_admin_params.ajax_nonce,
    delete_confirm = et_admin_params.delete_confirm,
    $container = $('.et-tab-settings-wrapper');

         /*
         * Enable Tab Description 
         */
         $container.on('change', '.etab-show-description', function () {
            if ($(this).prop('checked') == true) {
                $(this).closest('.et-tab-cbody').find('.etab-enable-description-options').slideDown('slow');
            } else {
                $(this).closest('.et-tab-cbody').find('.etab-enable-description-options').slideUp('slow');
            }
        });

    $('.icon-picker').iconPicker();

        /*
         * Add Tab using ajax only
         */
         $container.on('click', '.et-add-tabs-button', function (e) {
            var append_div = $container.find('.et_tab_append_wrapper');
            if ($container.find('.et-count-tab-wrap').length <= 100) {
                var perfom_action = 'add_tab';
                var data = {
                    action: 'et_append_tab_html',
                    _action: perfom_action,
                    _wpnonce: ajaxnonce
                };
                $.ajax({
                    type: 'post',
                    url: ajaxurl,
                    data: data,
                    beforeSend: function (xhr) {
                        $('.et-loader-image').show();
                    },
                    success: function (res) {
                        append_div.append(res);
                        $('.et-loader-image').hide();
                        $('.et-icon-picker').iconPicker();
                        alterColumnsIndex();
                        var response = $(res);
                        var key = response.find('.et_key_unique').val();
                        var key1 = "et-html-text";
                        var key21 = "et-html-text-" + key;
                        //init tinymce
                        // $('.et-html'+key).append( EDITOR );
                        // tinymce.execCommand( 'mceRemoveEditor', false, key1 );
                       // tinymce.execCommand('mceAddEditor', false, key21);

                       tinymce.execCommand('mceRemoveEditor', false, key1);
                       tinymce.execCommand('mceAddEditor', false, key21);
                       quicktags({id: key21});
                       tinymce.init({
                        selector: key21,
                        formats: {
                            alignleft: [
                            {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles: {textAlign: 'left'}},
                            {selector: 'img,table,dl.wp-caption', classes: 'alignleft'}
                            ],
                            aligncenter: [
                            {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles: {textAlign: 'center'}},
                            {selector: 'img,table,dl.wp-caption', classes: 'aligncenter'}
                            ],
                            alignright: [
                            {selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li', styles: {textAlign: 'right'}},
                            {selector: 'img,table,dl.wp-caption', classes: 'alignright'}
                            ],
                            strikethrough: {inline: 'del'}
                        },
                        relative_urls: false,
                        remove_script_host: false,
                        convert_urls: false,
                        browser_spellcheck: true,
                        fix_list_elements: true,
                        entities: "38,amp,60,lt,62,gt",
                        entity_encoding: "raw",
                        keep_styles: false,
                        paste_webkit_styles: "font-weight font-style color",
                        preview_styles: "font-family font-size font-weight font-style text-decoration text-transform",
                        wpeditimage_disable_captions: false,
                        wpeditimage_html5_captions: true,
                        plugins: "charmap,hr,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
                            // selector:"#" + fullId,
                            resize: "vertical",
                            menubar: false,
                            wpautop: true,
                            indent: false,
                            toolbar1: "bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,fullscreen,wp_adv", toolbar2: "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
                            toolbar3: "",
                            toolbar4: "",
                            tabfocus_elements: ":prev,:next",
                            body_class: "id post-type-post post-status-publish post-format-standard"
                        });
                       // $this.prop('disabled', false);
                        // tinymce.init({
                        //     selector: key21,
                        //     relative_urls: false,
                        //     remove_script_host: false,
                        //     convert_urls: false,
                        //     browser_spellcheck: true,
                        //     fix_list_elements: true,
                        //     entities: "38,amp,60,lt,62,gt",
                        //     entity_encoding: "raw",
                        //     keep_styles: false,
                        //     paste_webkit_styles: "font-weight font-style color",
                        //     preview_styles: "font-family font-size font-weight font-style text-decoration text-transform",
                        //     wpeditimage_disable_captions: false,
                        //     wpeditimage_html5_captions: true,
                        //     plugins: "charmap,hr,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
                        //     resize: "vertical",
                        //     menubar: false,
                        //     wpautop: true,
                        //     indent: false,
                        //     toolbar1: "bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,fullscreen,wp_adv", toolbar2: "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
                        //     toolbar3: "",
                        //     toolbar4: "",
                        //     tabfocus_elements: ":prev,:next",
                        //     body_class: "id post-type-post post-status-publish post-format-standard",

                        // });
                    }
                });
e.preventDefault();
} else {
    alert('Maximum Tab Addition Reached.');
}
});

$container.on('click', '.et-item-header-title,.et-tab-hide-show', function () {
    $(this).closest('.et-tab-item-inner').find('.et-tab-item-options').slideToggle('slow', function () {
        $(this).closest('.et-tab-item-inner').find('.et-tab-hide-show').toggleClass('et-active', $(this).is(':visible'));
        $(this).closest('.et-each-tab-column').toggleClass('et-active-column');
    });
});

$container.on('click', '.et-tab-delete', function (e) {
    var $this = $(this);
    if (confirm(delete_confirm)) {
        $this.closest('.et-each-tab-column').remove();
        alterColumnsIndex();
        e.preventDefault();
    } else {
        e.preventDefault();
    }
});

$container.on('change', '.et-tab_components-type', function () {
    var comp_type = $(this).val();
    var id = $(this).attr('id');
    var splitid = id.split('_');
    $(this).closest('.et-tab-cbody').find('.et_compontents_wrapper .et_tab_comp').hide();
    if (comp_type == "editor") {
        $('#wpeditor_' + splitid[1]).slideDown('slow');
    }else if (comp_type == "custom_link") {
        $('#clink_' + splitid[1]).slideDown('slow');
    }
});



$('.et_tab_append_wrapper').sortable({
    items: '.et-each-tab-column',
    containment: 'parent',
    handle: '.et-tab-sort',
    tolerance: 'pointer',
    cursor: "move",
    update: function () {
        alterColumnsIndex();
        var unique_id = $(this).closest('.et-each-tab-column').find('.et_key_unique').val();
        var key21 = "et-html-text-" + unique_id;
        tinymce.init({
            selector: key21
        });
    }
});

function alterColumnsIndex() {
    var outer_wrapper = $container.find('.et_tab_append_wrapper'),
    tabcolumns = outer_wrapper.find('.et-each-tab-column');
    for (var i = 0; i < tabcolumns.length; i++) {
        var current_column = tabcolumns.eq(i);
        var inputs = current_column.find('[name*="tab_items"]'),
        random_string = randomString(10);
        for (var j = 0; j < inputs.length; j++) {
            var current_input = inputs[j];
            if (current_input.type !== undefined) {
                current_input.setAttribute('name', current_input.getAttribute('name').replace(/item\[([a-zA-Z0-9]+)?\]/g, 'tab_items[' + random_string + ']'));
            }
        }


        var labeltext = current_column.find('.et-tab-title').val();
        if(labeltext != ''){
            current_column.find('.etab_title_text_disp').html(labeltext);
        }else{
            current_column.find('.etab_title_text_disp').html('Tab ' + (i + 1));
        }
        current_column.find('.et-item-header-title').attr('data-count',(i + 1));
    }
}
        /*
         * Random number generator
         */
         function randomString(len, charSet) {
            charSet = charSet || 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var randomString = '';
            for (var i = 0; i < len; i++) {
                var randomPoz = Math.floor(Math.random() * charSet.length);
                randomString += charSet.substring(randomPoz, randomPoz + 1);
            }
            return randomString;
        }

        // Icon Update

        $container.on('change', '.et-tab_icon-type', function () {
            var icon_type = $(this).val();
            if (icon_type == 'available_icon') {
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_available_icon').fadeIn();
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_upload_own_icon').fadeOut();
            } else if (icon_type == 'upload_own') {
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_upload_own_icon').fadeIn();
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_available_icon').fadeOut();
            } else {
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_upload_own_icon').fadeOut();
                $(this).closest('.et-tab-cbody').find('.et_selection_icontype_wrapper .et_available_icon').fadeOut();
            }
        }); 

        $container.on('keyup', '.et-tab-title', function (e) {
            if($(this).val() == ''){
                var count = $(this).closest('.et-tab-item-inner').find('.et-item-header-title').attr('data-count');
                $(this).closest('.et-tab-item-inner').find('.etab_title_text_disp').text('Tab '+count);
            }else{
                $(this).closest('.et-tab-item-inner').find('.etab_title_text_disp').text($(this).val());
            } 
        });

        /*
         * Shortcode auto copy
         */
         $('.etab-usage-trigger').click(function () {
            $('.etab-usage-trigger').removeClass('etab-active');
            $(this).addClass('etab-active');
            var active_tab_key = $('.etab-usage-trigger.etab-active').data('usage');
            $('.etab-usage-post').hide();
            $('.etab-usage-post[data-usage-ref="' + active_tab_key + '"]').show();
        });

         $('.et-short-code,.et-short-code2').click(function () {
            if ($(this).attr('id') == "sc") {
                $(this).focus();
                $(this).select();
                document.execCommand('copy');
                $(this).siblings('.et-copied-info').show().delay(1000).fadeOut();
            } else {
                $(this).focus();
                $(this).select();
                document.execCommand('copy');
                $(this).siblings('.et-copied-info2').show().delay(1000).fadeOut();
            }
        });

         $('.egpr-shortcode-display-value').click(function () {
            $(this).focus();
            $(this).select();
            document.execCommand('copy');
            $(this).siblings('.et-copied-info').show().delay(1000).fadeOut();
        });

    });//$(function () end
}(jQuery));


