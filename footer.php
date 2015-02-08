<?php
	 	 $foot_close = get_option('foot_close');
	 	 if ($foot_close == 'open') {
	?>
<?php include('inc/foot.php'); ?>
<?php } ?>
<div id="footer">
  <div class="container">
    <p class="pull-left">Copyright &copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url'); ?>">
      <?php bloginfo('name'); ?>
      </a> All rights reserved. &nbsp;<?php echo get_option('copy')?></p>
    <p class="social"> <?php echo get_option('icp')?> <?php echo get_option('tongji')?> <?php theme_Copyright(); ?>  
      </p>
  </div>
</div>
<?php echo get_option('footcode')?>
</body>
<?php $meeas_debug=false; if($meeas_debug):?>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/dist/Meeas/js/main.min.js'></script>
<?php else:?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/jquery.easing.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/jquery.flexslider-min.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/jquery.jticker.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/jquery.mobilemenu.js'></script>
<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/js/jquery.enplaceholder.js'></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
<?php endif;?>
</html>