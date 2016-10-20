//toggle the display of the main menu on mobile
jQuery(document).ready(function() {
    jQuery('.mobile-menu-btn').click(function() {
        jQuery('.main-navigation').slideToggle("fast");
        jQuery('.mobile-menu-btn').toggleClass('on');
    });
    
    jQuery('.sub-menu-button').click(function() {
        jQuery(this).next().next().slideToggle("fast");
        jQuery(this).toggleClass('active');
    });
});