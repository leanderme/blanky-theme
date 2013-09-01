<?php
/**
 * The Template generated from itunesLivePost
 *
 * @package WordPress
 * @subpackage iTunesLivePost
 * @since iTunesLivePost 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content container">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

			<article id="track track-<?php the_ID(); ?> post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_post_thumbnail(); ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="track-rating-info">
						<?php LM_show_stars();?>
					</div>
					<?php if ( comments_open() ) : ?>
						<div class="comments-link">
							<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
						</div><!-- .comments-link -->
					<?php endif; // comments_open() ?>
				</header><!-- .entry-header -->

				<div class="track-cont">
					<section>
						<div class="lm-audio-playr">
							<?php
							$lm_track = get_post_meta( get_the_ID(), 'iURL', true );
							do_shortcode('[lm-play src="'.$lm_track.'"]');
							?>
						</div>
					</section>
					<hr>
					<section>
						<div class="lm-audio-cont">
							<?php the_content();?>
						</div>
					</section>
				</div>
		
				<div class="track-entry-meta">
					<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
					<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
						<div class="author-info">
							<div class="author-avatar">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
							</div><!-- .author-avatar -->
							<div class="author-description">
								<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
								<p><?php the_author_meta( 'description' ); ?></p>
								<div class="author-link">
									<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
										<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
									</a>
								</div><!-- .author-link	-->
							</div><!-- .author-description -->
						</div><!-- .author-info -->
					<?php endif; ?>
				</div><!-- .track-entry-meta -->
			</article><!-- #post -->

				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '/track-comments.php' ); ?> 

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>