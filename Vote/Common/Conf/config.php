<?php
return array(
	//'配置项'=>'配置值'
	//Group config
	'DEFAULT_MODULE' => 'Home',
	'URL_MODEL'      => '1',
	'SESSION_AUTO_START' => true,

	//Database config
	'DB_TYPE' => 'mysql',
  'DB_HOST' => '121.248.63.106',
  'DB_NAME' => 'herald_vote',
  'DB_USER' => 'vote',
  'DB_PWD' => 'vote_password',
  'DB_PORT' => 3306,

  //Layout config
  'LAYOUT_ON' => true,

  //'SHOW_PAGE_TRACE' => true,
  'LOG_RECORD' => true, // 开启日志记录

  'DEFAULT_FILTER'  => 'strip_tags,htmlspecialchars'
);