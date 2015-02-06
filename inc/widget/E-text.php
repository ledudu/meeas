<?php  
add_action( 'widgets_init', 'e_textbanners' );

function e_textbanners() {
	register_widget( 'e_textbanner' );
}

class e_textbanner extends WP_Widget {
	function e_textbanner() {
		$widget_ops = array( 'classname' => 'e_textbanner', 'description' => '显示一个文本特别推荐，或者是一个网站告示' );
		$this->WP_Widget( 'e_textbanner', 'Enews-特别推荐', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_name', $instance['title']);
		$content = $instance['content'];
		$link = $instance['link'];
		$style = $instance['style'];
		$blank = $instance['blank'];

		$lank = '';
		if( $blank ) $lank = ' target="_blank"';

		echo $before_widget;
		echo '<dd><a class="'.$style.'" href="'.$link.'"'.$lank.'>';
		echo '<h2>'.$title.'</h2>';
		echo '<p>'.$content.'</p>';
		echo '</a></dd>';
		echo $after_widget;
	}

	function form($instance) {
?>

<p>
  <label> 标题：
    <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" class="widefat" />
  </label>
</p>
<p>
  <label> 描述：
    <textarea id="<?php echo $this->get_field_id('content'); ?>" name="<?php echo $this->get_field_name('content'); ?>" class="widefat" rows="3"><?php echo $instance['content']; ?></textarea>
  </label>
</p>
<p>
  <label> 链接：
    <input style="width:100%;" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" type="url" value="<?php echo $instance['link']; ?>" size="24" />
  </label>
</p>
<p>
  <label> 样式：
    <select id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" style="width:100%;">
      <option value="style01" <?php selected('style01', $instance['style']); ?>>蓝色</option>
      <option value="style02" <?php selected('style02', $instance['style']); ?>>橘红色</option>
      <option value="style03" <?php selected('style03', $instance['style']); ?>>绿色</option>
      <option value="style04" <?php selected('style04', $instance['style']); ?>>紫色</option>
      <option value="style05" <?php selected('style05', $instance['style']); ?>>青色</option>
    </select>
  </label>
</p>
<p>
  <label>
    <input style="vertical-align:-3px;margin-right:4px;" class="checkbox" type="checkbox" <?php checked( $instance['blank'], 'on' ); ?> id="<?php echo $this->get_field_id('blank'); ?>" name="<?php echo $this->get_field_name('blank'); ?>">
    新打开浏览器窗口 </label>
</p>
<?php
	}
}

?>
