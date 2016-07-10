<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<title>后台管理系统</title>

	<link rel="stylesheet" href="/newsystem/img/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="http://localhost/news_publish/img/css/ie.css" type="text/css" media="screen" />
	<script src="../../img/js/html5.js"></script>
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
			<h1 class="site_title"><a href="#">后台管理面板</a></h1>
			<h2 class="section_title"></h2><div class="btn_view_site"><a href="index.php">查看网站</a></div>
		</hgroup>
	</header> <!-- end of header bar -->

	<section id="secondary_bar">
		<div class="user">
			<p>admin</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php?c=admin">后台管理中心</a> <div class="breadcrumb_divider"></div> <a class="current">新闻管理列表</a></article>
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

		<article class="module width_full">
		<header><h3 class="tabs_involved">新闻管理列表</h3>
		</header>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
				<table class="tablesorter" cellspacing="0" style="margin:0">
					<thead>
						<tr>
			    				<th>ID</th>
			    				<th>标题</th>
			    				<th>作者</th>
			    				<th>操作</th>
						</tr>
					</thead>
					<tbody>
					<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "暂无新闻" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			    				<td><?php echo ($vo["id"]); ?></td>
			    				<td><?php echo ($vo["title"]); ?></td>
			    				<td><?php echo ($vo["author"]); ?></td>
			    				<td><input type="image" src="/newsystem/img/images/icn_edit.png" title="Edit" onclick="window.location.href='index.php?c=admin&a=newsedit&id=<?php echo ($vo["id"]); ?>'"><input type="image" src="/newsystem/img/images/icn_trash.png" title="Trash" onclick="window.location.href='index.php?c=admin&a=newsdel&id=<?php echo ($vo["id"]); ?>'"></td>
						</tr><?php endforeach; endif; else: echo "暂无新闻" ;endif; ?>
					</tbody>
				</table>
			</div><!-- end of #tab1 -->

			<div id="tab2" class="tab_content">

			</div><!-- end of #tab2 -->

		</div><!-- end of .tab_container -->

		</article><!-- end of content manager article -->
		<div class="spacer"></div>
	</section>


</body>

</html>