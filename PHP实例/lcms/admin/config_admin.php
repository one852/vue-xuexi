<?php
session_start();//启用SESSION
include '../start.php';

if ($_SESSION['user'] == null and $_SESSION['passwd'] == null){
    header("Location:".ADM_URL."/login.php");
    exit();
}else{
    $session_user = $_SESSION['user'];
    $session_passwd = $_SESSION['passwd'];
    $sql_user = "SELECT * FROM user WHERE name= '{$session_user}' and  passwd= '{$session_passwd}' ";
    $row_user = $db -> get($sql_user);
    if (!is_array($row_user)){
        header("Location:".ADM_URL."/login.php");
        exit();
    }
}
