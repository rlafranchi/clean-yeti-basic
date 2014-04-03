jQuery(document).foundation({ topbar: {sticky_class: 'found-sticky', mobile_show_parent_link: true}});
jQuery(document).ready( function ($) {
    $('#secondary').find('dd').each(function ()
        {
            var ddid = $(this).attr('id');
            $(this).find('.content').attr('id', 'panel-' + ddid);
    });
});