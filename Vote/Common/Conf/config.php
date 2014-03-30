<?php
return array(
	//'配置项'=>'配置值'
	//Group config
	'DEFAULT_MODULE' => 'Home',
	'URL_MODEL'      => '1',
	'SESSION_AUTO_START' => true,

	//Database config
	'DB_TYPE' => 'mysql',
  'DB_HOST' => 'localhost',
  'DB_NAME' => 'herald_vote',
  'DB_USER' => 'root',
  'DB_PWD' => '123456',
  'DB_PORT' => 3306,
  'DB_PREFIX' => 'vote_',

  //Layout config
  'LAYOUT_ON' => true,

  'SHOW_PAGE_TRACE' => true,

  'DEFAULT_FILTER'  => 'strip_tags,htmlspecialchars'
);