<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php $hasFeatImage = $content->hasFeatImage(); ?>
<?php $sbg = empty($meta->pagebg->transparent) ? $meta->pagebg->color : 'transparent'; ?>

<section id="<?php $content->slug(); ?>" class="about" style="background-color:<?php echo $sbg; ?>; text-align: left;">

	<?php if ( $hasFeatImage ) : ?>
	<img class="img-responsive" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>"/>
			<div class="header-center">
				<div class="centerdiv text-white">

					<?php if ( ! empty( $meta->author->featuredHeading ) ) echo '<h4 class="bigtext uppercase letterspace bold">' . $meta->author->featuredHeading . '</h4>'; ?>
					<?php if ( ! empty( $meta->author->featuredDescription ) ) echo '<h6 class="bigtext serif italic">' . $meta->author->featuredDescription . '</h6>'; ?>

				</div>
			</div>

	<?php endif; ?>

	<div class="row">
		<div class="nine columns center margin-bottom">
			<?php $content->content(); ?>
		</div>
	</div>
</section>