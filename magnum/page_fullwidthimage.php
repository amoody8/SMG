<?php
/*
Template Name: Fullwidth Image
*/
?>
<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php get_header(); ?>
<?php while ($content->looping() ) : ?>
<?php get_template_part("pagecontent","fullwidthimage"); ?>
<?php endwhile; ?>
<?php get_footer(); ?>