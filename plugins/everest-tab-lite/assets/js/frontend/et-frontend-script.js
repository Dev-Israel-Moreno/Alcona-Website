/*
 * Frontend JS Script
 * Version : 1.0.7
 */
jQuery(document).ready(function($) {

       $('.etab-label').each(function() {
        if( $(this).hasClass('etab-active-show')){
        var unique_id = $(this).parent().attr('data-id');
         var id= $(this).attr('id');
        $(this).closest('.etab-sc-main-wrapper').find('.'+unique_id+'.'+id).addClass("etab-active-content");
        }
       });

      /*
       * On Click Tab
       */
      $(".etab-trigger-on_click").on('click', '.etab-label',function(){
           if(!$(this).hasClass('etab-active-show')){
            var tabtype = $(this).find('a').attr('data-tabtype');
            if(tabtype == "component_type"){
            var tab_id = $(this).attr('id');
            var tab_parent_id = $(this).parent().data('id');

            $(this).siblings().removeClass('etab-active-show');
            $(this).addClass("etab-active-show");
            $(this).closest('.etab-sc-main-wrapper').find('.etab-content-section.'+tab_parent_id).removeClass('etab-active-content');
            $(this).closest('.etab-sc-main-wrapper').find('.'+tab_id).addClass("etab-active-content");
             }
           }
        });
 });
