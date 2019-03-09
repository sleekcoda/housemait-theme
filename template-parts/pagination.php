<?php
        $big = 999999999; // need an unlikely integer
            
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, (get_query_var('paged')) ? get_query_var('paged') : get_query_var('page') ),
            'total' => $apartment->max_num_pages,
            'before_page_number' => '',
            'mid_size'           => 2,
            'prev_text'          => '<i class="fa fa-arrow-left"></i>',
	        'next_text'          => '<i class="fa fa-arrow-right"></i>',
        ) );
?>