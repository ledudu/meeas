<div class="widget clearfix">
  <div class="enews-tab">
    <ul class="nav nav-tabs" id="enewsTabs">
      <li class="active"><a href="#tab-populars" data-toggle="tab">最新文章</a></li>
      <li><a href="#tab-recents" data-toggle="tab">随机文章</a></li>
      <li><a href="#tab-comments" data-toggle="tab">热门文章</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="tab-populars">
        <?php $rand_posts = get_posts('numberposts=5&orderby=date');foreach($rand_posts as $post) : ?>
        <div class="item">
          <figure class="pull-left"><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo catch_first_image(); ?>&h=60&w=67&zc=1" alt="<?php the_title(); ?>" class="thumbnail"/></figure>
          <div class="pull-right content">
            <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_title(); ?>
              </a></h4>
            <p class="meta"><i class="icon-time"></i>&nbsp;<?php the_time('Y-m-d') ?>&nbsp;&nbsp;<i class="icon-eye-open"></i>&nbsp;<?php echo getPostViews(get_the_ID());?>&nbsp;&nbsp;
            <?php    
			if ( comments_open() || '0' != get_comments_number() )
			comments_popup_link('<i class="icon-comment"></i> 0', '<i class="icon-comment"></i> 1', '<i class="icon-comment"></i> %', '');
			?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="tab-pane" id="tab-recents">
        <?php $rand_posts = get_posts('numberposts=5&orderby=rand');foreach($rand_posts as $post) : ?>
        <div class="item">
          <figure class="pull-left"><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo catch_first_image(); ?>&h=60&w=67&zc=1" alt="<?php the_title(); ?>" class="thumbnail"/></figure>
          <div class="pull-right content">
            <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_title(); ?>
              </a></h4>
            <p class="meta"><i class="icon-time"></i>&nbsp;<?php the_time('Y-m-d') ?>&nbsp;&nbsp;<i class="icon-eye-open"></i>&nbsp;<?php echo getPostViews(get_the_ID());?>&nbsp;&nbsp;
            <?php
					if ( comments_open() || '0' != get_comments_number() )
						comments_popup_link('<i class="icon-comment"></i> 0', '<i class="icon-comment"></i> 1', '<i class="icon-comment"></i> %', '');
				?>
          
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="tab-pane" id="tab-comments">
        <?php
$post_num = 5; // 设置调用条数
$args = array(
      'post_password' => '',
          'post_status' => 'publish', // 只选公开的文章.
          'post__not_in' => array($post->ID),//排除当前文章
          'caller_get_posts' => 1, // 排除置頂文章.
          'orderby' => 'comment_count', // 依評論數排序.
          'posts_per_page' => $post_num
);
        $query_posts = new WP_Query();
        $query_posts->query($args);
        while( $query_posts->have_posts() ) { $query_posts->the_post(); ?>
        <div class="item">
          <figure class="pull-left"><img src="<?php echo get_template_directory_uri(); ?>/timthumb.php?src=<?php echo catch_first_image(); ?>&h=60&w=67&zc=1" alt="<?php the_title(); ?>" class="thumbnail"/></figure>
          <div class="pull-right content">
            <h4><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_title(); ?>
              </a></h4>
            <p class="meta"><i class="icon-time"></i>&nbsp;<?php the_time('Y-m-d') ?>&nbsp;&nbsp;<i class="icon-eye-open"></i>&nbsp;<?php echo getPostViews(get_the_ID());?>&nbsp;&nbsp;
            <?php
					if ( comments_open() || '0' != get_comments_number() )
						comments_popup_link('<i class="icon-comment"></i> 0', '<i class="icon-comment"></i> 1', '<i class="icon-comment"></i> %', '');
				?>
          
          </div>
        </div>
        <?php } wp_reset_query();?>
      </div>
    </div>
  </div>
</div>
