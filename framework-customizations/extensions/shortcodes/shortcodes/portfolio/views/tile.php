<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$portfolio = fw()->extensions->get( 'portfolio' );
if ( empty( $portfolio ) ) {
	return;
}
/**
 * @var array $atts
 * @var array $posts
 */

//column paddings class
//margin values:
//0
//1
//2
//10
//30
$margin_class = '';
switch ( $atts['margin'] ) :
	case ( 0 ) :
		$margin_class = 'columns_padding_0';
		break;

	case ( 1 ) :
		$margin_class = 'columns_padding_1';
		break;

	case ( 2 ) :
		$margin_class = 'columns_padding_2';
		break;

	case ( 10 ) :
		$margin_class = 'columns_padding_5';
		break;
	//6
	default:
		$margin_class = 'columns_padding_15';
endswitch;

$unique_id = uniqid();

//getting query object
$queried_object = get_queried_object();

$requested_category = fw_get_db_term_option( $queried_object->term_taxonomy_id, $queried_object->taxonomy );

//get all terms for filter
$terms = get_terms( array( 'post_type ' => 'fw-portfolio-category' ) );

if ( count( $terms ) > 1 && $atts['show_filters'] ) { ?>

    <div class="filters-wrapper">

        <div class="filters isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
            <a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'cashelrie' ); ?></a>
            <?php
            foreach ( $terms as $term_key => $term_id ) {
                $current_term = get_term( $term_id, 'fw-portfolio-category' );
                ?>
                <a href="#"
                   data-filter=".<?php echo esc_attr( $current_term->slug ); ?>"><?php echo esc_html( $current_term->name ); ?></a>
                <?php
            } //foreach
            ?>
        </div>
    </div>
	<?php
} //count subcategories check
?>

<div class="<?php echo esc_attr( $margin_class ); ?>">
    <div class="isotope_container isotope row masonry-layout tile_gallery"
         data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
        <?php
        $counter = 1;
        while ( $posts->have_posts() ) : $posts->the_post();
            $width_class = ' col-lg-3 col-md-4 col-sm-6';
            if ( ( $counter % 6 === 3 ) || ( $counter === 3 ) ) {
                $width_class = ' col-lg-3 col-md-4 col-sm-6 high-item';
            } elseif ( ( $counter % 6 === 5 ) || ( $counter === 5 ) ) {
                $width_class = ' col-lg-6 col-md-8 col-sm-6';
            }
            $post_terms       = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
            $post_terms_class = '';
            foreach ( $post_terms as $post_term ) {
                $post_terms_class .= $post_term->slug . ' ';
            }
            ?>
            <div class="isotope-item<?php echo esc_attr( $width_class  . ' ' . $post_terms_class ); ?>">
                <?php
                //include item layout view file
                if ( has_post_thumbnail() ) {
                    include( fw()->extensions->get( 'portfolio' )->locate_view_path( esc_attr( $atts['item_layout'] ) ) );
                } else {
                    include( fw()->extensions->get( 'portfolio' )->locate_view_path( 'item-extended' ) );
                }
                ?>
            </div>
        <?php
        $counter++;
        endwhile; ?>
        <?php //removed reset the query ?>
    </div><!-- eof .isotope_container -->
</div><!-- eof .columns_padding_* -->