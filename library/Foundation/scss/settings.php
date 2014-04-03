<?php $options = cleanyetibasic_get_options(); ?>

@import "foundation/functions";
$rem-base: 16px;
$row-width: rem-calc(<?php echo $options['max_width']; ?>);

/* Top Bar */
$topbar-sticky-class: ".found-sticky";


$topbar-bg-color: <?php echo $options['topbar_bg']; ?>;
$topbar-dropdown-bg: $topbar-bg-color;
$topbar-dropdown-link-bg: $topbar-bg-color;

// $topbar-link-color: #fff;
// $topbar-link-color-hover: #fff;
// $topbar-link-color-active: #fff;
// $topbar-link-color-active-hover: #fff;

$topbar-link-bg-hover: scale-color($topbar-bg-color, $lightness: -14%);
$topbar-dropdown-label-bg: $topbar-bg-color;


/* Colors */
$primary-color: <?php echo $options['primary']; ?>;
$secondary-color: <?php echo $options['secondary']; ?>;
$cyb-header-bg-color: <?php echo $options['header_color']; ?>;
$cyb-footer-bg-color: <?php echo $options['footer_color']; ?>;