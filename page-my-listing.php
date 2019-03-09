<?php 

if(!current_user_can('edit_published_hmposts')):
    wp_redirect(wp_login_url());
    exit();
endif;

get_header();
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$args = array(
    'post_type'         => 'hmpost',
    'author'            => get_current_user_id(),
    'posts_per_page'     => 10,
    'paged'             => $paged,
    'post_status'       => 'any'
);
$query = new WP_Query($args);
 ?>
 <div class="container">
    <div class="  row justify-content-md-center">
        <div id="primary" class="content-area col" style="margin-top:32px;">
            <main id="main" class="site-main">
                <?php if($query->have_posts()): ?>
                <!-- list post loop -->
                    <div class="post-list">
                        <?php while($query->have_posts()): $query->the_post(); ?>
                            
                                <section class="hmpost-list"> 
                                
                                    <h5><a href="<?php echo get_bloginfo('url').'/post-ads?ads_id='.get_the_ID(); ?>"> <?php the_title(); ?></a></h5>
                                    
                                    <ul class="no-margin no-padding">
                                        <li><strong><i class="fa fa-<?php echo (get_post_status(  )==='pending') ? 'certificate  text-warning' : 'check-square-o text-success';?>"></i> </strong><?php echo get_post_status(  ); ?></li>
                                        <li><strong><i class="fa fa-calendar"></i> </strong> <?php echo get_the_date(  ) ?></li>
                                        <li><strong><a class="text-primary" href="<?php echo get_bloginfo('url').'/user/post-ads?ads_id='.get_the_ID(); ?>"><i class="fa fa-edit"></i> </strong> Edit Ads</a></li>
                                    </ul>
                                
                                </section>
                            
                        <?php   endwhile; ?>
                            

                            <div class="paginate">
                                <?php
                                    $big = 999999999; // need an unlikely integer
                                    echo paginate_links( array(
                                        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                        'format'    => '?paged=%#%',
                                        'current'   => max( 1, get_query_var('paged') ),
                                        'total'     => $query->max_num_pages,
                                        'prev_text' => '<i class="fa fa-arrow-left"></i>',
                                        'next_text' => '<i class="fa fa-arrow-right"></i>'
                                    ) );
                                ?>
                            </div>
                            
                            
                            <?php wp_reset_postdata(); ?>
                    </div>
                    
                    <!-- post loop ends -->
                <?php else: ?>
                <section class="hmpost-list"> 
                    <h5>You have not created any ads. <a href="<?php echo get_bloginfo('url').'/user/post-ads'; ?>">Create one now</a></h5>
                </section>
                <?php endif;?>
            </main>
        </div>
        <?php get_sidebar('admin'); ?>
    </div>
    <!-- close row -->
</div>
<!-- close .container -->
<?php get_footer(); ?>