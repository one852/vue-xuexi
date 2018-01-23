<?PHP
session_start();//启用SESSION
include '../start.php';

$config['admin_title']='登陆后台管理';

include APP_FILE.'/mb/admin/tx_header.php';



if ($input->get('yz') == 'login'){
    $user_name = $input->post('name');
    $user_passwd = $input->post('passwd');
    
    if ($user_name<>NULL and $user_passwd<>NULL){
        $sql = "SELECT * FROM user WHERE name='{$user_name}' and passwd='{$user_passwd}'";
        $row = $db->get($sql);
        if(is_array($row)){
            $_SESSION['user']=$row['name'];    
            $_SESSION['passwd']=$row['passwd']; 
            header("Location:".ADM_URL."/index.php");
        }else{
            $cwts = "用户名或密码错误!";            
            echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";
        }
    }else{
        $cwts = "用户名或密码不能为空!";            
        echo "<script>$(function () { $('#modal-cwts').modal({keyboard: true})});</script>";        
    }
}

include APP_FILE.'/mb/admin/tx_login.php';
include APP_FILE.'/mb/admin/tx_footer.php';
