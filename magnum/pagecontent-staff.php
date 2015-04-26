<?php $t =& peTheme(); ?>
<?php $content =& $t->content; ?>
<?php $meta =& $content->meta(); ?>
<?php $hasFeatImage = $content->hasFeatImage(); ?>

<section id="<?php $content->slug(); ?>" class="about-us" style="background-color:<?php echo $meta->pagebg->color; ?>">

	<div class="row">
		<div class="twelve columns title">
			<h1><?php $content->title(); ?></h1>
			<hr>
		</div>
	</div>

	<?php if ( $hasFeatImage ) : ?>

		<div style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>')" class="header bottom">
			<div class="header-center">
				<div class="centerdiv text-white">

					<?php if ( ! empty( $meta->staff->featuredHeading ) ) echo '<h4 class="bigtext uppercase letterspace bold">' . $meta->staff->featuredHeading . '</h4>'; ?>
					<?php if ( ! empty( $meta->staff->featuredDescription ) ) echo '<h6 class="bigtext serif italic">' . $meta->staff->featuredDescription . '</h6>'; ?>

				</div>
			</div>
		</div>

	<?php endif; ?>

	<div class="row">
		<div class="ten columns center margin-bottom">

			<?php if ( ! empty( $meta->staff->introTitle ) ) echo '<h2 class="text-color">' . $meta->staff->introTitle . '</h2>'; ?>
			<?php if ( ! empty( $meta->staff->intro ) ) echo '<p class="big thin">' . $meta->staff->intro . '</p>'; ?>

		</div>
	</div>

	<div class="row margins page-staff-content">

		<?php $content->content(); ?>

		<?php 

		if ( empty( $meta->staff->staff ) ) { 

			$staffs = get_posts( array( 'post_type' => 'staff', 'posts_per_page' => -1 ) );

			if ( is_array( $staffs ) ) {

				foreach( $staffs as $staff ) {

					$staffarray[] = $staff->ID;

				}

				$meta->staff->staff = $staffarray;

			}

		}

		?>

		<?php if ( ! empty( $meta->staff->staff ) ) : ?>

				
				<div class="row">

						<?php if ( $loop = $t->data->customLoop( (object) array( "post_type" => "staff", "id" => $meta->staff->staff, "orderby" => "post__in", ) ) ) : ?>

							<?php while ( $content->looping() ) : ?>

								<?php

									$meta =& $content->meta();
									$features = isset( $meta->info->features ) ? $meta->info->features : '';
									$social = isset( $meta->info->social ) ? $meta->info->social : '';
									$position = isset( $meta->info->position ) ? $meta->info->position : '';

								?>

								<!-- Service 1 -->
								<div class="service-item white-section four columns">

									<?php $content->img( 720, 462 ); ?>
									<?php if( get_field('initial') ): ?>
									<span class="initial" style="background:<?php the_field('bgcolor') ?>;"><?php the_field('initial') ?></span>
									<?php endif; ?>
									<!--<i class="<?php echo $meta->info->icon; ?>"></i>-->
									<h3><?php $content->title(); ?></h3>
									<h5 class="italic text-light"><?php echo $position; ?></h5>
									<?php if ( isset( $social ) && is_array( $social ) ): ?>
										<span>

											<?php foreach ( $social as $icon ) : ?>

												<?php 

													$icon['icon'] = explode( '|', $icon['icon'] );
													$icon['icon'] = $icon['icon'][0];

												?>

												<a href="<?php echo $icon['url']; ?>" target="_blank">
													<i class="<?php echo $icon['icon']; ?>"></i>
												</a>

											<?php endforeach; ?>

										</span>

									<?php endif; ?>
									<div class="service-carousel-content"><?php $content->content(); ?></div>

								</div>

							<?php endwhile; ?>

							<?php $content->resetLoop(); ?>

						<?php endif; ?>
			</div>


		<?php endif; ?>

	</div>
</section>