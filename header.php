<!DOCTYPE html>
<html>
<head><?php $meeas_debug = true; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include( 'inc/seo.php'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php if($meeas_debug):?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/dist/Meeas/css/style.min.css">
<?php else:?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap-responsive.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/flexslider.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/style.css">
<?php endif;?>
<!--[if lt IE 9]>
	<script src="<?php bloginfo('template_directory'); ?>/js/html5.js"></script>
<![endif]-->
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">
<?php echo get_option('headcode')?>
<style>
<?php echo get_option('csscode')?>
</style>
<?php wp_head(); ?>
</head><body>
<div>
    <div class="container">
        <header id="header" class="clearfix">
          <div class="logo pull-left"> <a href="<?php bloginfo('url'); ?>"><img alt="logo" src="<?php echo get_option('logo')?>" /></a> </div>
        </header>
    </div>
</div>
<div id="top-navigation">
  <div class="container">
    <ul class="nav-menu pull-left">
      <?php 
	  if(has_nav_menu('nav-menu')){
	  	wp_nav_menu(
		   array(
		    'theme_location'  => 'nav-menu',
		    'container' => '',
			'menu_class' => 'nav-menu pull-left',
		   )
	  	);
	  }else{
	  		echo "<ul class='nav-menu pull-left'><li><a href='".get_bloginfo('url')."/wp-admin/nav-menus.php'>还没有设置导航菜单，请到后台 外观->菜单 设置一个导航菜单</a></li></ul>";
	  }
	 ?>
    </ul>
    <form name="form-search" method="post" action="<?php bloginfo('home'); ?>" class="form-search pull-right">
      <input name="s" id="s" type="text" placeholder="输入关键字搜索" class="input-icon input-icon-search" />
    </form>
  </div>
</div>
<?php
	 	 $sign_close = get_option('sign_close');
	 	 if ($sign_close == 'open') {
	?>
<div class="headlines clearfix"> 
<div class="container" style="position: relative">
    <span class="base">公告：</span>
    <div class="text-rotator">
        <div><?php echo get_option('sign');?></div>
    </div>
</div>
</div>
<?php } ?>
<div class="container">
<div class="margin-bottom10"></div>
