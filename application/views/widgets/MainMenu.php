<!-- 主菜单 -->
<div class="nav">
<ul>
<!-- 首页 -->
<?php if($controller == 'index' && $action == 'index'){ ?>
	<li class="current">首页</li>
<?php } else { ?>
	<li><a href="<?php echo $this->createUrl('index/index'); ?>">首页</a></li>
<?php } ?>

<?php if($status == true){?>
	<!-- Controller管理 -->
	<?php if($controller == 'ctr' && $action == 'createcontroller') { ?>
		<li class="current">Controller管理</li>
	<?php } else { ?>
		<li><a href="<?php echo $this->createUrl('ctr/createcontroller'); ?>/?path=/application/controllers">Controller管理</a></li>
	<?php } ?>
	<!-- Model管理 -->
	<?php if($controller == 'model' && $action == 'createmodel') { ?>
		<li class="current">Model管理</li>
	<?php } else { ?>
		<li><a href="<?php echo $this->createUrl('model/createmodel'); ?>/?path=/application/models">Model管理</a></li>
	<?php } ?>
	<!-- 文件管理 -->
	<?php if($controller == 'file' && $action == 'index') { ?>
		<li class="current">文件管理</li>
	<?php } else { ?>
		<li><a href="<?php echo $this->createUrl('file/index'); ?>">文件管理</a></li>
	<?php } ?>
<?php } else { ?>
	<!-- WebApp管理 -->
	<?php if($controller == 'index' && $action == 'webapp'){ ?>
		<li class="current">WebApp管理</li>
	<?php } else { ?>
		<li><a href="<?php echo $this->createUrl('index/webapp'); ?>">WebApp管理</a></li>
	<?php } ?>
<?php } ?>
</ul>
</div>
<!-- /主菜单 -->