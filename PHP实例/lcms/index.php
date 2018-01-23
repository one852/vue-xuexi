<?PHP
include 'start.php';
//查数据总数
$sql = 'SELECT count(*) as total FROM `user`';
$usert = $db->get($sql)[0];
echo $usert.'<br>';

//读取一条数据
$sqlz = 'SELECT * FROM `user`';
$usertz = $db->get($sqlz);
echo $usertz['name'].'<br>';


//读取多条数据;   条件 -> LIMIT 0,10    从第0条开始往后取10条数据
$sqls = 'SELECT * FROM `user` ORDER BY id DESC LIMIT 0,10';
$users = $db->gets($sqls);
    if (!$users){
        echo '没有查询结果;<br>';
    }else{
        foreach ($users as $user) {
            echo 'ID:'.$user['id'].' 用户名:'.$user['name'].' 密码:'.$user['passwd'].'<br>';
    }

}


//echo (int)$input->get('p');

