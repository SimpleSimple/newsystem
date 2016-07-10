<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_PARSE_STRING'  =>array(
	     // '__PUBLIC__' => '/Common', // 更改默认的/Public 替换规则
	     '__JS__'     => '/Public/JS/', // 增加新的JS类库路径替换规则
	     '__CSS__' => __ROOT__.'/Public/css', // 增加新的CSS样式路径替换规则
	)
);