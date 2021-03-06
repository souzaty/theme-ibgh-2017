<?php
   /* Template Name: BLOG */
?>
<?php get_header(); ?>
<section class="interna-ibgh title-page">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h1><?php the_title(); ?></h1>
         </div>
      </div>
   </div>
</section>
<section id="posts">
   <div class="container">
      <div class="row">
         <div class="col-md-9">
            <!-- Main Blog Content -->
            <!-- Post 01 -->
            <?php global $post;
               $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                         $wp_query = new WP_Query();
               $wp_query->query('post_type=post&cat=104&orderby=date&order=DESC&posts_per_page=4&paged=' . $paged);
                ?>
            <?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>
            <div class="postResume">
               <article>
                  <div class="col-md-5">
                     <?php the_post_thumbnail('noticias-home-heelj'); ?>
                  </div>
                  <div class="col-md-7 gutter-30">
                     <div class="postMeta" style="margin-top:5px;">
                        <abbr class="published updated" title="<?php the_time('j/m/Y'); ?>"><span class="clock"></span><?php the_time('j/m/Y'); ?></abbr> <span class="tag"></span>
                        <?php the_category( ', ' ); ?>
                     </div>
                     <h3 class="postTitle entry-title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
                     <div class="postSummary entry-content">
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php echo get_permalink(); ?>"><button style="margin-right:20px" type="button" class="btn btn-default btn-blue" aria-label="Left Align">Leia mais</button></a>
                     </div>
                  </div>
               </article>
            </div>
            <?php endwhile; ?>
            <!-- Pagination -->
            <?php
               if ( function_exists('wp_bootstrap_pagination') )
                 wp_bootstrap_pagination();
               ?>
            <?php endif; wp_reset_query(); ?>
         </div>
         <!-- End col-md-9 -->
         <div class="col-md-3">
            <?php
               if(is_active_sidebar('blog-ibgh')){
                  dynamic_sidebar('blog-ibgh');
               }
               ?>
         </div>
      </div>
   </div>
</section>
<?php get_footer(); ?>
