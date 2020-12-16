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

//1 - col-*-12
//2 - col-*-6
//3 - col-*-4
//4 - col-*-3
//6 - col-*-2

//bootstrap col-lg-* class
$lg_class = '';
switch ( $atts['responsive_lg'] ) :
	case ( 1 ) :
		$lg_class = 'col-lg-12';
		break;

	case ( 2 ) :
		$lg_class = 'col-lg-6';
		break;

	case ( 3 ) :
		$lg_class = 'col-lg-4';
		break;

	case ( 4 ) :
		$lg_class = 'col-lg-3';
		break;
	//6
	default:
		$lg_class = 'col-lg-2';
endswitch;

//bootstrap col-md-* class
$md_class = '';
switch ( $atts['responsive_md'] ) :
	case ( 1 ) :
		$md_class = 'col-md-12';
		break;

	case ( 2 ) :
		$md_class = 'col-md-6';
		break;

	case ( 3 ) :
		$md_class = 'col-md-4';
		break;

	case ( 4 ) :
		$md_class = 'col-md-3';
		break;
	//6
	default:
		$md_class = 'col-md-2';
endswitch;

//bootstrap col-sm-* class
$sm_class = '';
switch ( $atts['responsive_sm'] ) :
	case ( 1 ) :
		$sm_class = 'col-sm-12';
		break;

	case ( 2 ) :
		$sm_class = 'col-sm-6';
		break;

	case ( 3 ) :
		$sm_class = 'col-sm-4';
		break;

	case ( 4 ) :
		$sm_class = 'col-sm-3';
		break;
	//6
	default:
		$sm_class = 'col-sm-2';
endswitch;

//bootstrap col-xs-* class
$xs_class = '';
switch ( $atts['responsive_xs'] ) :
	case ( 1 ) :
		$xs_class = 'col-xs-12';
		break;

	case ( 2 ) :
		$xs_class = 'col-xs-6';
		break;

	case ( 3 ) :
		$xs_class = 'col-xs-4';
		break;

	case ( 4 ) :
		$xs_class = 'col-xs-3';
		break;
	//6
	default:
		$xs_class = 'col-xs-2';
endswitch;

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
		$margin_class = '';
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

<div class="isotope_container isotope row masonry-layout <?php echo esc_attr( $margin_class ); ?>"
    data-filters=".isotope_filters-<?php echo esc_attr( $unique_id ); ?>">
    <?php while ( $posts->have_posts() ) : $posts->the_post();
        $post_terms       = get_the_terms( get_the_ID(), 'fw-portfolio-category' );
        $post_terms_class = '';
        foreach ( $post_terms as $post_term ) {
            $post_terms_class .= $post_term->slug . ' ';
        }
        ?>
        <div
            class="isotope-item <?php echo esc_attr( 'item-layout-' . $atts['item_layout'] . ' ' . $lg_class . ' ' . $md_class . ' ' . $sm_class . ' ' . $xs_class . ' ' . $post_terms_class ); ?>">
            <?php
            //include item layout view file
            if ( has_post_thumbnail() ) {
                include( fw()->extensions->get( 'portfolio' )->locate_view_path( esc_attr( $atts['item_layout'] ) ) );
            } else {
                include( fw()->extensions->get( 'portfolio' )->locate_view_path( 'item-extended' ) );
            }
            ?>
        </div>
    <?php endwhile; ?>
    <?php //removed reset the query ?>
</div><!-- eof .isotope_container -->