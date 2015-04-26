<?php $t =& peTheme();?>
<?php $content =& $t->content; ?>
<?php $meta = $t->content->meta(); ?>

<?php $template = is_page() ? $t->content->pageTemplate() : false; ?>

<!-- Menu -->
<div class="main-menu <?php echo ( ( is_front_page() && is_page() ) || $template === "page_home.php" ) ? 'fixedmenu' : 'alreadyfixed'; ?>">
	
	<div class="menu-wrap">

		<?php $logo = $t->options->get("logo"); ?>

		<?php if ( ! empty( $logo ) ) : ?>
			
				<a href="<?php echo home_url(); ?>" class="smoothscroll smg-logo"><?php $t->image->retina($logo); ?></a>
			
		<?php else : ?>

				<h1><a href="<?php echo home_url(); ?>" class="smoothscroll"><?php echo $t->options->get("siteTitle"); ?></a></h1>
		<?php endif; ?>
				<input type="checkbox" id="toggle" />
				<label for="toggle" class="toggle"></label>

				<?php $t->menu->show("main"); ?>

	</div>
	
</div>