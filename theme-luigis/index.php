<?php
/*
Template Name: Blog
*/
get_header(); ?>

<section class="bg-7 h-500x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white pt-90">
                                <h5><b></b></h5>
                                <h3 class="mt-30 mb-15">Blog</h3>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>

<section class="story-area left-text center-sm-text pos-relative">
        <div class="abs-tbl bg-2 w-20 z--1 dplay-md-none"></div>
        <div class="abs-tbr bg-3 w-20 z--1 dplay-md-none"></div>
        <div class="container">
            
<?php
  while(have_posts()) {
	the_post();?>
	<div>
<?php the_post_thumbnail(array(730, 292)); ?>
	<h4><b><a href="<?php the_permalink();?>"><?php the_title();?></a></b></h4>
	</div>
	
	<h6 class="mt-10 bg-lite-blue dplay-inl-block">
                                                <a class="plr-20 mtb-10" href="#"><b>By <?php the_author_posts_link();?></b></a>
                                                <a class="plr-20 mtb-10 brder-lr-lite-black-2" href="#"><b><?php the_time('n.j.y');?></b></a>
                                                <a class="plr-20 mtb-10" href="#"><b><?php echo get_the_category_list(',');?></b></a>
                                        </h6>
	
	<p class="mt-30">
<?php the_excerpt(); ?>
</p>
<p><a class="btn btn--red" href="<?php the_permalink();?>">Continue reading &raquo;</a></p>
<?php } 
echo paginate_links();
?>




</div>
</div>
</div>
</section>
<?php 
get_footer();
?>