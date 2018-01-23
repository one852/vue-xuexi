<?PHP
//配置文件

//配置前台网址
define('APP_URL','http://127.0.0.1/lcms');
//配置前台文件路径
define('APP_FILE',dirname(__FILE__));
//配置后台网址
define('ADM_URL', APP_URL.'/admin');
//配置后台文件路径
define('ADM_FILE', APP_FILE.'/admin');

//定义一个数组
$config = array();

//定义一个数据库数组并为每个健赋值
$config ['db']['dbhost'] = '127.0.0.1';
$config ['db']['dbuser'] = 'root';
$config ['db']['passwd'] = '';
$config ['db']['dbname'] = 'lcms';