<?php 
get_header();
?>
<section class="bg-7 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b></b></h5>
                                <h3 class="mt-30 mb-15">Searching...</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>

<section class="story-area left-text center-sm-text pos-relative">
        <div class="abs-tbl bg-2 w-20 z--1 dplay-md-none"></div>
        <div class="abs-tbr bg-3 w-20 z--1 dplay-md-none"></div>
        <div class="container">
<h4>Search Results for '<?php echo get_search_query();?>'</h4>
<?php get_template_part('archive');?>




 <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>


<?php previous_posts_link();?>
<?php next_posts_link();?>
</div>
</div>
</div>
</section>
<?php 
get_footer();
?>