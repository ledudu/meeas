<div class="row-fluid blog-posts">
  <?php
	 	 $top_close = get_option('top_close');
	 	 if ($top_close == 'open') {
	?>
  <?php include('top.php'); ?>
  <?php } ?>
  <div class="clearfix ie-sep"></div>
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <div class="post clearfix">
    <div class="content post-content-block">
      <h2><a href="<?php the_permalink() ?>" title="详细阅读 <?php the_title_attribute(); ?>">
        <?php the_title(); ?>
        </a>
        <?php newpost();?>
      </h2>
      <div class="meta"> <span class="pull-left"> <i class="icon-user"></i>
        <?php the_author_posts_link(); ?>
        - <i class="icon-time"></i>
        <?php the_time('Y年n月j日') ?>
        - <i class="icon-list"></i>
        <?php the_category(', ') ?>
        - <i class="icon-comment"></i>
        <?php comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?>
        - <i class="icon-eye-open"></i> <?php echo getPostViews(get_the_ID());?>浏览</span> <span class="pull-right-read-more"><a href="<?php the_permalink(); ?>">阅读更多...</a></span> </div>
      <p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 290,"...","utf-8"); ?></p>
      <?php if(the_tags()){?>
      <div class="meta"> <span class="info-tag-icon">
        <?php the_tags('标签：', ', ', ''); ?>
        </span> </div>
      <?php }?>
    </div>
    <figure> <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo catch_first_image(); ?>&h=190&w=185&zc=1" alt="<?php the_title(); ?>" class="thumbnail"/></a> </figure>
  </div>
  <?php endwhile; ?>
  <?php else : ?>
  <?php endif; ?>
  <nav class="nav-pagination">
    <?php pagination($query_string); ?>
  </nav>
</div>
