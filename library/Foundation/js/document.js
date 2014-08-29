jQuery(document).foundation({ topbar: {sticky_class: 'found-sticky', mobile_show_parent_link: true}});
jQuery(document).ready( function ($) {
    $('#secondary').find('dd').each(function ()
        {
            var ddid = $(this).attr('id');
            $(this).find('.content').attr('id', 'panel-' + ddid);
    });
        var footerHeight = $('#footer').height();
        var mainHeight = $('#main').outerHeight();
        var headerHeight = $('#header').outerHeight();
        var winHeight = $(window).height();
        var totalHeight = footerHeight + mainHeight + headerHeight;
        if (totalHeight < winHeight ) {
          var marHeight = winHeight - totalHeight;
          $('#footer').css({ 'margin-top' : (marHeight - 20) + 'px' });
        }	else {
          $('#footer').removeAttr('style');
        }
    $(window).resize(function(){
        footerHeight = $('#footer').height();
        mainHeight = $('#main').outerHeight();
        headerHeight = $('#header').outerHeight();
        winHeight = $(window).height();
        totalHeight = footerHeight + mainHeight + headerHeight;
        if (totalHeight < winHeight ) {
          var marHeight = winHeight - totalHeight;
          $('#footer').css({ 'margin-top' : (marHeight - 20) + 'px' });
        }	else {
          $('#footer').removeAttr('style');
        }
        $(window).resize();
    });
});
