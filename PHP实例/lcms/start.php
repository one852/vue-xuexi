<?PHP
header("Content-type: text/html; charset=utf-8");
//调用配置文件
include 'config.php';

//调用db类文件,并实例化db类为对象
include APP_FILE.'/lib/db.class.php';
$db = new db($config['db']['dbhost'],$config['db']['dbuser'],$config['db']['passwd'],$config['db']['dbname']);

//调用处理用于提交方式的类文件
include APP_FILE.'/lib/input.class.php';
$input = new input();