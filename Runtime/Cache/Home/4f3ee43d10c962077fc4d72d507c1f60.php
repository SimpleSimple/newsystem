<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>后台管理系统</title>

	<link rel="stylesheet" href="/newsystem/img/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="img/css/ie.css" type="text/css" media="screen" />
	<script src="img/js/html5.js"></script>
	<![endif]-->
	<script src="/newsystem/img/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="/newsystem/img/js/hideshow.js" type="text/javascript"></script>
	<script src="/newsystem/img/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="/newsystem/img/js/jquery.equalHeight.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function()
    	{
      	  $(".tablesorter").tablesorter();
   	 }
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php?c=admin">后台管理面板</a></h1>
			<h2 class="section_title"></h2><div class="btn_view_site"><a href="http://localhost/news_publish/">查看网站</a></div>
		</hgroup>
	</header> <!-- end of header bar -->

	<section id="secondary_bar">
		<div class="user">
			<p>admin</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php?c=admin">后台管理系统</a> <div class="breadcrumb_divider"></div> <a class="current">文章发布</a></article>
		</div>
	</section><!-- end of secondary bar -->

	<aside id="sidebar" class="column">
	<h3>新闻管理</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="index.php?c=admin&a=newsadd">添加新闻</a></li>
		<li class="icn_categories"><a href="index.php?c=admin&a=showNewsList">管理新闻</a></li>
	</ul>
	<h3>管理员管理</h3>
	<ul class="toggle">
		<li class="icn_jump_back"><a href="index.php?c=admin&a=loginOut">退出登录</a></li>
	</ul>

	<footer>

	</footer>
</aside><!-- end of sidebar -->

	<section id="main" class="column">
		<form id="form1" name="form1" method="post" action="index.php?c=admin&a=newsAdd">
			<article class="module width_full">
				<header><h3>发表新文章</h3></header>
					<div class="module_content">
							<fieldset>
								<label>标题</label>
								<input type="text" name="title" value="<?php echo ($news["title"]); ?>">
							</fieldset>
							<fieldset>
								<label>内容</label>
								<textarea rows="12" name="content"><?php echo ($news["content"]); ?></textarea>
							</fieldset>
							<fieldset style="width:48%; float:left; margin-right: 3%;">
								<label>作者</label>
								<input type="text" name="author" style="width:92%;" value="<?php echo ($news["author"]); ?>">
							</fieldset>
							<fieldset style="width:48%; float:left;">
								<label>出处</label>
								<input type="text" name="from" style="width:92%;" value="<?php echo ($news["from"]); ?>">
							</fieldset><div class="clear"></div>
					</div>
				<footer>
					<div class="submit_link">
						<input type="hidden" name="id" value="<?php echo ($news["id"]); ?>">
						<input type="submit" name="submit" value="发布" class="alt_btn">
					</div>
				</footer>
			</article>
		</form>
		<div class="spacer"></div>
	</section>


</body>

</html>