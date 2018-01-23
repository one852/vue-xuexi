<?PHP
include 'config_admin.php';

$config['admin_title']='用户管理';

include APP_FILE.'/mb/admin/tx_header.php';
include APP_FILE.'/mb/admin/tx_nav.php';


//添加
if ($input->get('yz')=='add'){
    $user_name = $input->post('name');
    $user_passwd = $input->post('passwd');
    
    if ($user_name<>NULL and $user_passwd<>NULL){
        $sql_yz = "SELECT * FROM user WHERE name = '{$user_name}'";
        $row_yz = $db -> get($sql_yz);
        if ($row_yz){
            $cwts = "用户名已经存在!";            
            echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";
        }else{
            $sql_add = "INSERT INTO user (name, passwd) VALUES ('{$user_name}', '{$user_passwd}');";
            $row_add = $db -> query($sql_add);
            if ($row_add){                
                $cwts = "用户名:".$user_name." 添加成功!";            
                echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";
            }else{
                $cwts = "添加失败!";            
                echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";
            }
        }
            
    }else{
        $cwts = "用户名或密码不能加空!";            
        echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";
    }
}
//更新
if ($input->get('yz')=='up'){
    $user_id = (int)$input->get('id');
    $user_name = $input->post('name');
    $user_passwd = $input->post('passwd');
    
    if ($user_name<>NULL and $user_passwd<>NULL and $user_id<>NULL){
        $sql_yz = "SELECT * FROM user WHERE name = '{$user_name}'";
        $row_yz = $db -> get($sql_yz);
        if ($row_yz){
            if ($row_yz['id'] == $user_id){
                $sql_up = "UPDATE  user SET name = '{$user_name}', passwd =  '{$user_passwd}' WHERE id =  '{$user_id}'";
                $row_up = $db -> query($sql_up);
                if ($row_up){
                    $cwts = "修改成功!";            
                    echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";
                }else{
                    $cwts = "修改失败!";            
                    echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";            
                }
            }else{
                $cwts = "用户名已经存在!";            
                echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";   
            }
        }else{
            $sql_up = "UPDATE  user SET name = '{$user_name}', passwd =  '{$user_passwd}' WHERE id =  '{$user_id}'";
            $row_up = $db -> query($sql_up);
            if ($row_up){
                $cwts = "修改成功!";            
                echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";
            }else{
                $cwts = "修改失败!";            
                echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";            
            }
        }
            
    }else{
        $cwts = "用户名或密码不能加空!";            
        echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";
    }
}
//删除
if ($input->get('up')=='del'){
    $user_id = (int)$input->get('id');
    if ($user_id <> NULL){
        $sql_del = "DELETE FROM user WHERE id = '{$user_id}'";
        $row_del = $db->query($sql_del);
        $cwts = "用户删除成功!";            
        echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";
    }
}


//读取修改用户数据
if ($input->get("up") == "yes" and $input->get("id") <> NULL){
    $sql_up_dq = "SELECT * FROM user WHERE id = '{$input->get("id")}'";
    $rs_up = $db -> get($sql_up_dq);
}

//读取用户列表
$sql_user = "SELECT * FROM user ORDER BY id ASC";
$row_user = $db -> gets($sql_user);

include APP_FILE.'/mb/admin/tx_user.php';
include APP_FILE.'/mb/admin/tx_footer.php';

