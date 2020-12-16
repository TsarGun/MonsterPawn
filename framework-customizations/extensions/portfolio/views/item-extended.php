<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Portfolio - extended item layout
 */

?>
<div class="vertical-item content-padding big-padding text-center with_border with_background">
	<?php if ( has_post_thumbnail() ) : ?>
        <div class="item-media-wrap">
            <div class="item-media">
		        <?php
		        the_post_thumbnail();
		        ?>
                <div class="media-links">
                    <a class="abs-link" href="<?php the_permalink(); ?>"></a>
                </div>
            </div>
        </div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
        <header class="entry-header">
            <div class="categories-links small-text highlight2links">
		        <?php
		        echo get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ' ', '' );
		        ?>
            </div>
            <h3 class="entry-title">
                <a href="<?php the_permalink(); ?>">
			        <?php the_title(); ?>
                </a>
            </h3>
        </header>
        <div class="content-3lines-ellipsis">
	        <?php echo the_excerpt(); ?>
        </div>

	</div>
</div><!-- eof vertical-item -->
